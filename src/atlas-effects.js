/*!
 * AtlasWordz interaction kit
 * atlas-effects.js  -- no dependencies, no build step required
 *
 * Effects
 *   1. Cursor trail       dashed survey line following the pointer, pinned to
 *                         the page so it scrolls with the content
 *   2. Coordinate pill    live lat/long readout trailing the pointer
 *   3. Plotted containers outline draws in when scrolled into view, then the
 *                         contents fade up in sequence
 *
 * Usage
 *   <link rel="stylesheet" href="atlas-effects.css">
 *   <script src="atlas-effects.js" defer></script>
 *   ...auto-initialises on DOMContentLoaded with the defaults below.
 *
 *   To configure, add data-manual to the script tag and call init yourself:
 *   <script src="atlas-effects.js" data-manual defer></script>
 *   <script>AtlasEffects.init({ trail: { life: 600 } });</script>
 *
 * API
 *   AtlasEffects.init(options)   start (safe to call once; call destroy first
 *                                to re-init with different options)
 *   AtlasEffects.destroy()       remove all listeners, nodes and classes
 *   AtlasEffects.refresh()       re-measure after layout or content changes
 *   AtlasEffects.plot(el, delay) plot one container manually
 *   AtlasEffects.observe(root)   register containers added after init
 */
(function (global, document) {
  'use strict';

  /* ---------------------------------------------------------------------------
   * Defaults
   * ------------------------------------------------------------------------ */
  var DEFAULTS = {
    /* which effects to run */
    trail:  true,
    pill:   true,
    frames: true,
    stamps: true,       /* country stamp on click */
    preloader: false,   /* opt in; or add data-preloader to the script tag */

    /* selectors */
    frameSelector:  '[data-frame]',   // containers that draw their outline in
    revealSelector: '[data-reveal]',  // blocks that just fade up
    darkSelector:   '.why, .cta, footer', // sections the trail and pill invert over
    heroSelector:   '.hero',          // frames here plot on load, not on scroll

    trailOptions: {
      life:       850,   // ms a point survives before it has fully faded
      minStep:    5,     // px of travel before a new point is recorded
      maxPoints:  90,    // hard cap, keeps the per-frame cost flat
      dash:       [5, 7],
      markEvery:  78,    // px between the small survey marks
      widthHead:  2.2,   // stroke width at the cursor
      widthTail:  1.4,   // stroke width at the far end
      colorLight: '21, 51, 42',      // rgb triplet, used over light sections
      colorDark:  '244, 238, 226',   // rgb triplet, used over dark sections
      colorMark:  '232, 102, 59',
      maxOpacity: .85
    },

    pillOptions: {
      offsetX: 18,       // px right of the cursor
      offsetY: 20,       // px below the cursor
      ease:    .18,      // 0-1, lower is a longer lag behind the cursor
      /* the coordinate range the page is mapped onto */
      latTop:    72,     // degrees at the top of the document
      latBottom: -56,    // degrees at the bottom of the document
      lonLeft:  -168,    // degrees at the left of the viewport
      lonRight:  168     // degrees at the right of the viewport
    },

    stampOptions: {
      life:      1100,   // ms the stamp stays before the ink starts to dry
      size:      88,     // px, must match .atlas-stamp in the CSS
      maxLive:   8,      // oldest stamp is dropped beyond this
      /* clicks on or inside these never stamp */
      ignore:    'a, button, input, select, textarea, label, [data-dd], .dd, .nav, nav',
      colors:    ['#3B6082', '#C0452C'],   // stamp-pad blue and worn red, alternating
      countries: ['SPAIN','FRANCE','GERMANY','PORTUGAL','CHINA','JAPAN',
                  'SAUDI ARABIA','KOREA','RUSSIA','ITALY','INDIA',
                  'UNITED KINGDOM','BRAZIL','MEXICO','NETHERLANDS']
    },

    preloaderOptions: {
      minShow:   1500,   // never flash: stays up at least this long
      maxShow:   6000,   // never trap: leaves by now even if load hangs
      wordmark:  'Atlas<b>Wordz</b>',   // innerHTML of the mark
      /* the coordinates tick toward this destination as loading completes */
      destLat:   41.39,
      destLon:   2.17
    },

    frameOptions: {
      /* Must match --atlas-draw-duration + --atlas-draw-delay in the CSS.
         Contents appear once the outline has closed. */
      fillDelay:   860,
      childStagger: 70,  // ms between each child appearing
      batchStagger: 130, // ms between sibling containers entering together
      batchWindow:  260, // containers seen within this window count as a batch
      threshold:   .15,  // IntersectionObserver threshold
      rootMargin:  '0px 0px -8% 0px',
      heroDelay:   260,  // first hero container
      heroStagger: 180,  // between hero containers
      heroFallback: 900  // plot the hero by now even if load has not fired
    }
  };

  var SVG_NS = 'http://www.w3.org/2000/svg';

  /* ---------------------------------------------------------------------------
   * State
   * ------------------------------------------------------------------------ */
  var opts       = null;
  var started    = false;
  var reduced    = false;
  var listeners  = [];   // [target, type, handler, options]
  var observers  = [];   // IntersectionObserver / ResizeObserver
  var timers     = [];
  var frames     = [];   // { el, svg, sync }
  var rafId      = null;

  var canvas = null, ctx = null;
  var pill = null, pillLat = null, pillLon = null;

  var mouseX = -9999, mouseY = -9999, hasPointer = false;
  var pillX = 0, pillY = 0;
  var points = [];
  var sinceMark = 0;
  var darkBands = [];    // [[pageTop, pageBottom], ...]

  /* ---------------------------------------------------------------------------
   * Small helpers
   * ------------------------------------------------------------------------ */
  function on(target, type, handler, options){
    target.addEventListener(type, handler, options);
    listeners.push([target, type, handler, options]);
  }

  function later(fn, ms){
    var id = setTimeout(fn, ms);
    timers.push(id);
    return id;
  }

  function merge(base, extra){
    var out = {}, key;
    for(key in base){ if(Object.prototype.hasOwnProperty.call(base, key)) out[key] = base[key]; }
    if(extra){
      for(key in extra){
        if(!Object.prototype.hasOwnProperty.call(extra, key)) continue;
        var v = extra[key];
        out[key] = (v && typeof v === 'object' && !Array.isArray(v) && typeof base[key] === 'object')
          ? merge(base[key], v)
          : v;
      }
    }
    return out;
  }

  function toDMS(value, negSuffix, posSuffix){
    var abs = Math.abs(value);
    var deg = Math.floor(abs);
    var min = Math.round((abs - deg) * 60);
    if(min === 60){ deg += 1; min = 0; }
    return deg + '°' + (min < 10 ? '0' + min : min) + '′' + (value < 0 ? negSuffix : posSuffix);
  }

  function docHeight(){
    return Math.max(1, document.documentElement.scrollHeight);
  }

  /* ---------------------------------------------------------------------------
   * Dark grounds
   * Stored in page coordinates so they survive scrolling without recalculation.
   * ------------------------------------------------------------------------ */
  function collectDarkBands(){
    darkBands = [];
    if(!opts.darkSelector) return;
    var nodes = document.querySelectorAll(opts.darkSelector);
    for(var i = 0; i < nodes.length; i++){
      var r = nodes[i].getBoundingClientRect();
      darkBands.push([r.top + global.scrollY, r.bottom + global.scrollY]);
    }
  }

  function isOverDark(pageY){
    for(var i = 0; i < darkBands.length; i++){
      if(pageY >= darkBands[i][0] && pageY <= darkBands[i][1]) return true;
    }
    return false;
  }

  /* ---------------------------------------------------------------------------
   * 1. Cursor trail
   * ------------------------------------------------------------------------ */
  function buildCanvas(){
    canvas = document.createElement('canvas');
    canvas.className = 'atlas-trail';
    canvas.setAttribute('aria-hidden', 'true');
    document.body.appendChild(canvas);
    ctx = canvas.getContext('2d');
    sizeCanvas();
  }

  function sizeCanvas(){
    if(!canvas) return;
    var dpr = Math.min(global.devicePixelRatio || 1, 2);
    canvas.width  = global.innerWidth  * dpr;
    canvas.height = global.innerHeight * dpr;
    canvas.style.width  = global.innerWidth  + 'px';
    canvas.style.height = global.innerHeight + 'px';
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function drawTrail(now){
    var t = opts.trailOptions;
    ctx.clearRect(0, 0, global.innerWidth, global.innerHeight);

    while(points.length && now - points[0].t > t.life) points.shift();
    if(points.length < 2) return;

    /* points are in page space; shift into viewport space to paint */
    var ox = global.scrollX, oy = global.scrollY;

    ctx.lineCap = 'round';
    ctx.lineJoin = 'round';

    var run = 0;  // distance along the path, keeps the dashes flowing
    for(var i = 1; i < points.length; i++){
      var pa = points[i - 1], pb = points[i];
      var ax = pa.x - ox, ay = pa.y - oy;
      var bx = pb.x - ox, by = pb.y - oy;
      var seg = Math.sqrt((bx - ax) * (bx - ax) + (by - ay) * (by - ay));

      var age   = (now - pb.t) / t.life;   // 0 fresh, 1 expired
      var taper = i / points.length;       // strongest at the cursor
      var alpha = Math.max(0, (1 - age) * taper * t.maxOpacity);

      if(alpha > .01){
        ctx.save();
        ctx.setLineDash(t.dash);
        ctx.lineDashOffset = -run;
        ctx.lineWidth = t.widthTail + taper * (t.widthHead - t.widthTail);
        ctx.strokeStyle = 'rgba(' + (pb.dark ? t.colorDark : t.colorLight) + ',' + alpha + ')';
        ctx.beginPath();
        ctx.moveTo(ax, ay);
        ctx.lineTo(bx, by);
        ctx.stroke();
        ctx.restore();
      }

      run += seg;

      if(pb.mark && alpha > .05){
        ctx.beginPath();
        ctx.arc(bx, by, 2.2, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(' + t.colorMark + ',' + Math.min(1, alpha * 1.3) + ')';
        ctx.fill();
      }
    }
  }

  /* ---------------------------------------------------------------------------
   * 2. Coordinate pill
   * ------------------------------------------------------------------------ */
  function buildPill(){
    pill = document.createElement('div');
    pill.className = 'atlas-coords';
    pill.setAttribute('aria-hidden', 'true');
    pill.innerHTML =
      '<span class="atlas-coords__dot"></span>' +
      '<span class="atlas-coords__lat">0°00′N</span>' +
      '<span class="atlas-coords__sep">/</span>' +
      '<span class="atlas-coords__lon">0°00′E</span>';
    document.body.appendChild(pill);
    pillLat = pill.querySelector('.atlas-coords__lat');
    pillLon = pill.querySelector('.atlas-coords__lon');
  }

  function updatePill(){
    var p = opts.pillOptions;
    pillX += (mouseX + p.offsetX - pillX) * p.ease;
    pillY += (mouseY + p.offsetY - pillY) * p.ease;
    pill.style.transform = 'translate3d(' + pillX.toFixed(1) + 'px,' + pillY.toFixed(1) + 'px,0)';

    var progress = (global.scrollY + mouseY) / docHeight();
    var lat = p.latTop - progress * (p.latTop - p.latBottom);
    var lon = p.lonLeft + (mouseX / global.innerWidth) * (p.lonRight - p.lonLeft);
    pillLat.textContent = toDMS(lat, 'S', 'N');
    pillLon.textContent = toDMS(lon, 'W', 'E');
  }

  /* ---------------------------------------------------------------------------
   * Shared pointer loop
   * ------------------------------------------------------------------------ */
  function onMouseMove(e){
    mouseX = e.clientX;
    mouseY = e.clientY;

    if(!hasPointer){
      hasPointer = true;
      pillX = mouseX + opts.pillOptions.offsetX;
      pillY = mouseY + opts.pillOptions.offsetY;
      if(pill){
        pill.style.transform = 'translate3d(' + pillX + 'px,' + pillY + 'px,0)';
        pill.classList.add('is-visible');
      }
    }

    var pageX = mouseX + global.scrollX;
    var pageY = mouseY + global.scrollY;
    var dark  = isOverDark(pageY);

    if(pill) pill.classList.toggle('is-dark', dark);
    if(!opts.trail) return;

    var t = opts.trailOptions;
    var last = points[points.length - 1];
    var step = last ? Math.sqrt((pageX - last.x) * (pageX - last.x) + (pageY - last.y) * (pageY - last.y)) : 0;

    if(!last || step >= t.minStep){
      sinceMark += step;
      var mark = false;
      if(sinceMark > t.markEvery){ mark = true; sinceMark = 0; }
      points.push({ x: pageX, y: pageY, t: (global.performance || Date).now(), dark: dark, mark: mark });
      if(points.length > t.maxPoints) points.shift();
    }
  }

  function loop(){
    var now = (global.performance || Date).now();
    if(opts.trail && ctx) drawTrail(now);
    if(opts.pill && pill && hasPointer) updatePill();
    rafId = global.requestAnimationFrame(loop);
  }

  /* ---------------------------------------------------------------------------
   * 5. Country stamps
   * A click on open ground presses a passport-style entry stamp at the click
   * point. Stamps are positioned in document coordinates, so they belong to
   * the page and scroll with it, then dissipate after stampOptions.life ms.
   * ------------------------------------------------------------------------ */
  var stampLayer = null;
  var stampCount = 0;
  var liveStamps = [];   /* {x, y, el} of stamps still on the page */

  function stampAt(pageX, pageY){
    var s = opts.stampOptions;

    if(!stampLayer){
      stampLayer = document.createElement('div');
      stampLayer.className = 'atlas-stamp-layer';
      stampLayer.setAttribute('aria-hidden', 'true');
      document.body.appendChild(stampLayer);
    }

    /* cap how many are alive at once */
    while(liveStamps.length >= s.maxLive){
      var oldest = liveStamps.shift();
      if(oldest.el.parentNode) oldest.el.parentNode.removeChild(oldest.el);
    }

    var country = s.countries[(stampCount + (Math.random() * 3 | 0)) % s.countries.length];
    var color   = s.colors[stampCount % s.colors.length];
    var angle   = (Math.random() * 28 - 14).toFixed(1);
    var maskId  = 'atlas-stamp-arc-' + (++stampCount) + '-' + Math.random().toString(36).slice(2, 6);

    var months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
    var now = new Date();
    var dateLine = now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();

    var el = document.createElement('div');
    el.className = 'atlas-stamp';
    el.style.left = pageX + 'px';
    el.style.top  = pageY + 'px';
    /* rotation rides on the wrapper so the in/out keyframes can own scale */
    el.innerHTML =
      '<svg viewBox="0 0 128 128" fill="none" style="transform:rotate(' + angle + 'deg)">' +
        '<defs>' +
          '<path id="' + maskId + '-t" d="M 24,64 A 40,40 0 0 1 104,64"/>' +   /* top arc */
          '<path id="' + maskId + '-b" d="M 20,64 A 44,44 0 0 0 108,64"/>' +   /* bottom arc */
        '</defs>' +
        '<circle cx="64" cy="64" r="60" stroke="' + color + '" stroke-width="2.5"/>' +
        '<circle cx="64" cy="64" r="52" stroke="' + color + '" stroke-width="1" stroke-dasharray="3 4"/>' +
        '<text fill="' + color + '" font-size="12.5" font-weight="700" letter-spacing="2.5" ' +
              'font-family="Arial, Helvetica, sans-serif">' +
          '<textPath href="#' + maskId + '-t" startOffset="50%" text-anchor="middle">' + country + '</textPath>' +
        '</text>' +
        '<text fill="' + color + '" font-size="8.5" letter-spacing="2" opacity=".75" ' +
              'font-family="Arial, Helvetica, sans-serif">' +
          '<textPath href="#' + maskId + '-b" startOffset="50%" text-anchor="middle">ATLASWORDZ · TRANSLATED</textPath>' +
        '</text>' +
        '<line x1="34" y1="58" x2="94" y2="58" stroke="' + color + '" stroke-width="1"/>' +
        '<text x="64" y="72" fill="' + color + '" font-size="10.5" font-weight="700" letter-spacing="1.5" ' +
              'text-anchor="middle" font-family="Arial, Helvetica, sans-serif">' + dateLine + '</text>' +
        '<line x1="34" y1="79" x2="94" y2="79" stroke="' + color + '" stroke-width="1"/>' +
      '</svg>';
    stampLayer.appendChild(el);
    var record = { x: pageX, y: pageY, el: el };
    liveStamps.push(record);

    later(function(){ el.classList.add('is-fading'); }, s.life);
    later(function(){
      if(el.parentNode) el.parentNode.removeChild(el);
      var idx = liveStamps.indexOf(record);
      if(idx > -1) liveStamps.splice(idx, 1);
    }, s.life + 1150);
  }

  function onStampClick(e){
    /* left button, no modifiers, not on anything interactive, not mid-preload */
    if(e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
    if(opts.preloader && !preloaderDone) return;
    if(e.target.closest && e.target.closest(opts.stampOptions.ignore)) return;
    stampAt(e.pageX, e.pageY);
  }

  /* ---------------------------------------------------------------------------
   * 4. Preloader
   * Shows immediately on init, leaves when the window has loaded AND minShow
   * has passed, or at maxShow regardless. Dispatches 'atlas:preloaded' on the
   * document when it goes; the hero containers wait for that event so their
   * outlines draw in front of the visitor, not behind the chart.
   * ------------------------------------------------------------------------ */
  var preloaderDone = false;

  function buildPreloader(){
    var p = opts.preloaderOptions;

    preloaderDone = false;   /* fresh state on re-init */
    document.documentElement.classList.add('atlas-preloading');

    var el = document.createElement('div');
    el.className = 'atlas-preloader';
    el.setAttribute('role', 'status');
    el.setAttribute('aria-label', 'Loading');
    el.innerHTML =
      '<svg class="atlas-preloader__compass" viewBox="0 0 120 120" fill="none" aria-hidden="true">' +
        /* faint dashed chart ring, static */
        '<circle cx="60" cy="60" r="44" stroke="rgba(21,51,42,.18)" stroke-width="1" stroke-dasharray="2 5"/>' +
        /* the ring that plots itself */
        '<circle class="atlas-preloader__ring" cx="60" cy="60" r="56" pathLength="1"/>' +
        '<g class="atlas-preloader__ticks">' +
          '<line x1="60" y1="4"  x2="60" y2="12"/><line x1="60" y1="108" x2="60" y2="116"/>' +
          '<line x1="4"  y1="60" x2="12" y2="60"/><line x1="108" y1="60" x2="116" y2="60"/>' +
        '</g>' +
        '<text class="atlas-preloader__letter atlas-preloader__letter--n" x="60" y="30">N</text>' +
        '<text class="atlas-preloader__letter" x="60" y="97">S</text>' +
        '<text class="atlas-preloader__letter" x="92" y="64">E</text>' +
        '<text class="atlas-preloader__letter" x="28" y="64">W</text>' +
        '<g class="atlas-preloader__needle">' +
          '<path d="M60,30 L64.5,60 L60,67 L55.5,60 Z" fill="#E8663B"/>' +
          '<path d="M60,90 L64.5,60 L60,67 L55.5,60 Z" fill="rgba(21,51,42,.3)"/>' +
          '<circle cx="60" cy="60" r="3.5" fill="#15332A"/>' +
        '</g>' +
      '</svg>' +
      '<div class="atlas-preloader__mark">' + p.wordmark + '</div>' +
      '<div class="atlas-preloader__coords">0°00′N&nbsp;&nbsp;0°00′E</div>';
    document.body.appendChild(el);

    /* coordinates wander in and converge on the destination */
    var coordsEl = el.querySelector('.atlas-preloader__coords');
    var t0 = (global.performance || Date).now();
    var coordTimer = setInterval(function(){
      var k = Math.min(1, ((global.performance || Date).now() - t0) / p.minShow);
      var wobble = (1 - k) * (1 - k);
      var lat = p.destLat + Math.sin(k * 29) * 38 * wobble;
      var lon = p.destLon + Math.cos(k * 23) * 74 * wobble;
      coordsEl.textContent = toDMS(lat, 'S', 'N') + '  ' + toDMS(lon, 'W', 'E');
    }, 90);
    timers.push(coordTimer);

    var shownAt = (global.performance || Date).now();
    function leave(){
      if(preloaderDone) return;
      preloaderDone = true;
      clearInterval(coordTimer);
      el.classList.add('is-done');
      document.documentElement.classList.remove('atlas-preloading');
      document.dispatchEvent(new CustomEvent('atlas:preloaded'));
      later(function(){ if(el.parentNode) el.parentNode.removeChild(el); }, 800);
    }
    function onLoaded(){
      var waited = (global.performance || Date).now() - shownAt;
      later(leave, Math.max(0, p.minShow - waited));
    }
    if(document.readyState === 'complete') onLoaded();
    else on(global, 'load', onLoaded);
    later(leave, p.maxShow);   /* hung asset never traps the visitor */
  }

  /* ---------------------------------------------------------------------------
   * 3. Plotted containers
   * ------------------------------------------------------------------------ */
  var uid = 0;

  var frameLayer = null;

  function getFrameLayer(){
    if(!frameLayer){
      frameLayer = document.createElement('div');
      frameLayer.className = 'atlas-frame-layer';
      frameLayer.setAttribute('aria-hidden', 'true');
      document.body.appendChild(frameLayer);
    }
    return frameLayer;
  }

  function buildFrame(el){
    var radius = parseFloat(el.getAttribute('data-radius') || '8');
    var maskId = 'atlas-plate-' + (++uid) + '-' + Math.random().toString(36).slice(2, 7);

    el.classList.add('atlas-fw');

    var svg = document.createElementNS(SVG_NS, 'svg');
    svg.setAttribute('class', 'atlas-frame');
    svg.setAttribute('preserveAspectRatio', 'none');
    svg.setAttribute('aria-hidden', 'true');
    svg.setAttribute('focusable', 'false');

    /* mask: a fat stroke around the same rectangle, unrolled by the transition */
    var defs = document.createElementNS(SVG_NS, 'defs');
    var mask = document.createElementNS(SVG_NS, 'mask');
    mask.setAttribute('id', maskId);
    mask.setAttribute('maskUnits', 'userSpaceOnUse');

    var reveal = document.createElementNS(SVG_NS, 'rect');
    reveal.setAttribute('class', 'atlas-frame__reveal');
    reveal.setAttribute('pathLength', '1');   // one dash spans the whole perimeter
    reveal.setAttribute('x', '1');
    reveal.setAttribute('y', '1');
    reveal.setAttribute('rx', radius);
    mask.appendChild(reveal);
    defs.appendChild(mask);
    svg.appendChild(defs);

    var plate = document.createElementNS(SVG_NS, 'rect');
    plate.setAttribute('class', 'atlas-frame__plate');
    plate.setAttribute('mask', 'url(#' + maskId + ')');
    plate.setAttribute('x', '1');
    plate.setAttribute('y', '1');
    plate.setAttribute('rx', radius);
    svg.appendChild(plate);

    /* into the page-level overlay, never into the container (see the CSS) */
    getFrameLayer().appendChild(svg);

    /* position the SVG over the container in document coordinates */
    function sync(){
      var fit = el.getAttribute('data-frame-fit');
      var inset = fit === 'tight' ? 8 : fit === 'wide' ? 22 : 14;
      var r = el.getBoundingClientRect();
      if(r.width <= 2 || r.height <= 2) return;

      var w = Math.round(r.width)  + inset * 2;
      var h = Math.round(r.height) + inset * 2;

      svg.style.left   = Math.round(r.left + global.scrollX - inset) + 'px';
      svg.style.top    = Math.round(r.top  + global.scrollY - inset) + 'px';
      svg.style.width  = w + 'px';
      svg.style.height = h + 'px';
      svg.setAttribute('viewBox', '0 0 ' + w + ' ' + h);

      plate.setAttribute('width',  w - 2);
      plate.setAttribute('height', h - 2);
      reveal.setAttribute('width',  w - 2);
      reveal.setAttribute('height', h - 2);

      /* mirror the ground so dark sections get the light stroke */
      svg.classList.toggle('atlas-frame--dark',
        isOverDark(r.top + global.scrollY + r.height / 2));
    }

    sync();

    if(global.ResizeObserver){
      var ro = new global.ResizeObserver(sync);
      ro.observe(el);
      /* body resize catches reflow that moves the element without resizing it */
      ro.observe(document.body);
      observers.push(ro);
    }
    on(global, 'load', sync);

    el.__atlasSvg = svg;
    return { el: el, svg: svg, sync: sync };
  }

  function plot(el, delay){
    later(function(){
      el.classList.add('is-plotting');
      if(el.__atlasSvg) el.__atlasSvg.classList.add('is-plotting');
      later(function(){
        el.classList.add('is-filled');
        if(el.__atlasSvg) el.__atlasSvg.classList.add('is-filled');
        var kids = el.children, shown = 0;
        for(var i = 0; i < kids.length; i++){
          kids[i].style.transitionDelay = (shown * opts.frameOptions.childStagger / 1000) + 's';
          shown++;
        }
      }, opts.frameOptions.fillDelay);
    }, delay || 0);
  }

  function setupFrames(root){
    var f = opts.frameOptions;
    var scope = root || document;
    var nodes = scope.querySelectorAll(opts.frameSelector);
    if(!nodes.length) return;

    var hero = opts.heroSelector ? document.querySelector(opts.heroSelector) : null;
    var pending = [];

    for(var i = 0; i < nodes.length; i++){
      var el = nodes[i];
      if(el.__atlasFramed) continue;
      el.__atlasFramed = true;

      if(reduced){
        el.classList.add('atlas-fw', 'is-plotting', 'is-filled');
        continue;
      }

      frames.push(buildFrame(el));
      if(hero && hero.contains(el)) pending.push(el);
      else scrollObserver.observe(el);
    }

    /* hero containers plot on entry rather than on scroll */
    if(pending.length){
      var fired = false;
      var run = function(){
        if(fired) return;
        fired = true;
        collectDarkBands();
        for(var k = 0; k < pending.length; k++){
          plot(pending[k], f.heroDelay + k * f.heroStagger);
        }
      };
      if(opts.preloader && !preloaderDone){
        /* wait for the chart to lift so the outlines draw in front of the
           visitor; the preloader's maxShow guarantees the event fires */
        on(document, 'atlas:preloaded', run);
      }else if(document.readyState === 'complete'){
        later(run, f.heroDelay);
      }else{
        on(global, 'load', run);
        later(run, f.heroFallback);   // never leave hero copy hidden
      }
    }
  }

  var scrollObserver = null;
  var revealObserver = null;

  function buildObservers(){
    var f = opts.frameOptions;
    var batchDelay = 0, batchAt = 0;

    scrollObserver = new global.IntersectionObserver(function(entries){
      var now = (global.performance || Date).now();
      if(now - batchAt > f.batchWindow) batchDelay = 0;
      for(var i = 0; i < entries.length; i++){
        if(!entries[i].isIntersecting) continue;
        scrollObserver.unobserve(entries[i].target);
        plot(entries[i].target, batchDelay);
        batchDelay += f.batchStagger;
        batchAt = now;
      }
    }, { threshold: f.threshold, rootMargin: f.rootMargin });
    observers.push(scrollObserver);

    revealObserver = new global.IntersectionObserver(function(entries){
      for(var i = 0; i < entries.length; i++){
        if(!entries[i].isIntersecting) continue;
        entries[i].target.classList.add('is-visible');
        revealObserver.unobserve(entries[i].target);
      }
    }, { threshold: .2 });
    observers.push(revealObserver);
  }

  function setupReveals(root){
    var nodes = (root || document).querySelectorAll(opts.revealSelector);
    for(var i = 0; i < nodes.length; i++){
      if(reduced) nodes[i].classList.add('is-visible');
      else revealObserver.observe(nodes[i]);
    }
  }

  /* ---------------------------------------------------------------------------
   * Public API
   * ------------------------------------------------------------------------ */
  var api = {
    init: function(options){
      if(started) return api;
      started = true;
      opts = merge(DEFAULTS, options);

      reduced = global.matchMedia
        ? global.matchMedia('(prefers-reduced-motion: reduce)').matches
        : false;

      /* Touch devices: the trail and pill are pointer effects and would fight
         scrolling, so they switch off. Stamps stay on, since a clean tap fires
         a click; scrolls and taps on interactive elements never stamp. The
         plotted containers and preloader behave the same on every input. */
      var coarse = global.matchMedia
        ? global.matchMedia('(hover: none), (pointer: coarse)').matches
        : false;
      if(coarse){
        opts.trail = false;
        opts.pill  = false;
      }

      /* Signals to the CSS that it is safe to hide content before revealing it.
         Without this, a blocked script would leave the page blank. */
      document.documentElement.classList.add('atlas-ready');

      /* dark grounds get a class so the CSS can restyle the plate colour */
      if(opts.darkSelector){
        var darks = document.querySelectorAll(opts.darkSelector);
        for(var i = 0; i < darks.length; i++) darks[i].classList.add('atlas-dark-ground');
      }
      collectDarkBands();

      if(opts.preloader && !reduced) buildPreloader();

      buildObservers();
      if(opts.frames) setupFrames(document);
      setupReveals(document);

      if(!reduced && opts.stamps){
        on(document, 'click', onStampClick);
      }

      if(!reduced && (opts.trail || opts.pill)){
        if(opts.trail) buildCanvas();
        if(opts.pill)  buildPill();

        on(global, 'mousemove', onMouseMove, { passive: true });
        on(global, 'mouseleave', function(){ if(pill) pill.classList.remove('is-visible'); });
        on(global, 'mouseenter', function(){ if(pill && hasPointer) pill.classList.add('is-visible'); });
        on(global, 'resize', function(){ sizeCanvas(); collectDarkBands(); });
        /* layout below the fold settles after images load */
        on(global, 'load', collectDarkBands);

        rafId = global.requestAnimationFrame(loop);
      }

      return api;
    },

    /* re-measure after content or layout changes */
    refresh: function(){
      collectDarkBands();
      sizeCanvas();
      for(var i = 0; i < frames.length; i++) frames[i].sync();
      return api;
    },

    /* register containers added to the DOM after init */
    observe: function(root){
      if(!started) return api;
      if(opts.frames) setupFrames(root || document);
      setupReveals(root || document);
      return api;
    },

    plot: function(el, delay){
      if(el) plot(el, delay || 0);
      return api;
    },

    destroy: function(){
      if(!started) return api;
      started = false;

      if(rafId) global.cancelAnimationFrame(rafId);
      rafId = null;

      for(var i = 0; i < listeners.length; i++){
        listeners[i][0].removeEventListener(listeners[i][1], listeners[i][2], listeners[i][3]);
      }
      listeners = [];

      for(var j = 0; j < observers.length; j++){
        if(observers[j].disconnect) observers[j].disconnect();
      }
      observers = [];

      for(var k = 0; k < timers.length; k++) clearTimeout(timers[k]);
      timers = [];

      for(var m = 0; m < frames.length; m++){
        var fr = frames[m];
        if(fr.svg && fr.svg.parentNode) fr.svg.parentNode.removeChild(fr.svg);
        fr.el.classList.remove('atlas-fw', 'is-plotting', 'is-filled');
        fr.el.__atlasFramed = false;
        fr.el.__atlasSvg = null;
        for(var n = 0; n < fr.el.children.length; n++) fr.el.children[n].style.transitionDelay = '';
      }
      frames = [];

      if(canvas && canvas.parentNode) canvas.parentNode.removeChild(canvas);
      if(pill && pill.parentNode) pill.parentNode.removeChild(pill);
      if(frameLayer && frameLayer.parentNode) frameLayer.parentNode.removeChild(frameLayer);
      if(stampLayer && stampLayer.parentNode) stampLayer.parentNode.removeChild(stampLayer);
      canvas = ctx = pill = pillLat = pillLon = frameLayer = stampLayer = null;
      liveStamps = [];

      points = [];
      hasPointer = false;
      document.documentElement.classList.remove('atlas-ready');

      return api;
    },

    /* exposed for reference */
    defaults: DEFAULTS
  };

  global.AtlasEffects = api;

  /* auto-init unless the script tag carries data-manual;
     data-preloader on the script tag switches the preloader on */
  var self = document.currentScript;
  if(!self || !self.hasAttribute('data-manual')){
    var auto = { preloader: !!(self && self.hasAttribute('data-preloader')) };
    if(document.readyState === 'loading'){
      document.addEventListener('DOMContentLoaded', function(){ api.init(auto); });
    }else{
      api.init(auto);
    }
  }

})(window, document);
