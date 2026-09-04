/*!
 * AtlasWordz nav dropdowns
 * nav-dropdowns.js  -- no dependencies
 *
 * Behaviour
 *   - a trigger opens its panel and closes any other open panel
 *   - clicking outside, or pressing Escape, closes everything
 *   - triggers are <button> elements, so they never navigate
 *   - the currency options update the trigger label and flag
 *
 * Markup contract
 *   <div class="navitem">
 *     <button class="nav-link" type="button"
 *             data-dd="dd-services" aria-expanded="false"
 *             aria-haspopup="true" aria-controls="dd-services">
 *       Services <img class="chev" src="chevron.svg" alt="">
 *     </button>
 *     <div class="dd" id="dd-services" role="menu">
 *       <a class="dd-link" href="/certified" role="menuitem">Certified translation</a>
 *       <a class="dd-link" href="/standard"  role="menuitem">Standard translation</a>
 *     </div>
 *   </div>
 *
 * The open panel is styled by the .open class. The chevron flip and the
 * underline both key off aria-expanded, so state lives in one place.
 */
(function (global, document) {
  'use strict';

  /* Guard against running twice. Binding a second set of handlers would make
     every trigger toggle itself open then closed again, so the menus would
     appear dead. Matters for SPA re-mounts and duplicated script tags. */
  var initialised = false;
  var bound = [];   // [target, type, handler] for destroy()

  function on(target, type, handler){
    target.addEventListener(type, handler);
    bound.push([target, type, handler]);
  }

  function init(){
    if(initialised) return;

    var triggers = [].slice.call(document.querySelectorAll('[data-dd]'));
    if(!triggers.length) return;   // nothing to bind yet; safe to call again later

    initialised = true;

    function panelFor(trigger){
      return document.getElementById(trigger.getAttribute('data-dd'));
    }

    function closeAll(except){
      triggers.forEach(function(trigger){
        var panel = panelFor(trigger);
        if(!panel || panel === except) return;
        panel.classList.remove('open');
        trigger.setAttribute('aria-expanded', 'false');
      });
    }

    triggers.forEach(function(trigger){
      var panel = panelFor(trigger);
      if(!panel || trigger.__atlasBound) return;
      trigger.__atlasBound = true;

      on(trigger, 'click', function(e){
        e.preventDefault();
        e.stopPropagation();
        var isOpen = panel.classList.contains('open');
        closeAll();
        if(!isOpen){
          panel.classList.add('open');
          trigger.setAttribute('aria-expanded', 'true');
        }
      });

      /* clicks inside a panel must not bubble to the document closer */
      on(panel, 'click', function(e){ e.stopPropagation(); });
    });

    on(document, 'click', function(){ closeAll(); });

    on(document, 'keydown', function(e){
      if(e.key === 'Escape' || e.keyCode === 27){
        closeAll();
        if(document.activeElement && document.activeElement.blur) document.activeElement.blur();
      }
    });

    /* --- currency selection ---------------------------------------------- */
    var curFlag = document.getElementById('curFlag');
    var curCode = document.getElementById('curCode');
    var options = [].slice.call(document.querySelectorAll('.cur-opt'));

    /* the flag markup differs per country; keep it in one place */
    var FLAG_MARKUP = {
      'f-us': '<i></i><i></i><i></i><i></i><b></b>',
      'f-eu': '<b></b>',
      'f-gb': '<i></i><i></i><i></i><i></i>'
    };

    options.forEach(function(option){
      if(option.__atlasBound) return;
      option.__atlasBound = true;
      on(option, 'click', function(){
        options.forEach(function(o){ o.setAttribute('aria-selected', 'false'); });
        option.setAttribute('aria-selected', 'true');

        var code = option.getAttribute('data-code');
        var flag = option.getAttribute('data-flag');

        if(curCode) curCode.textContent = code;
        if(curFlag){
          curFlag.className = 'mflag ' + flag;
          curFlag.innerHTML = FLAG_MARKUP[flag] || '';
        }

        /* Hook for the build: this is where the price formatter should be told
           the currency has changed. Nothing else in the prototype reacts. */
        document.dispatchEvent(new CustomEvent('atlas:currencychange', { detail: { code: code } }));

        closeAll();
      });
    });

    /* placeholder links must not jump the page in the prototype.
       Remove this block once the links point at real routes. */
    on(document, 'click', function(e){
      var anchor = e.target.closest ? e.target.closest('a[href="#"]') : null;
      if(anchor) e.preventDefault();
    });

    /* --- mobile menu: dark scrim + bottom sheet with tabbed options ------- */
    var mnav      = document.getElementById('mnav');
    var mnavOpen  = document.getElementById('mnavOpen');
    var mnavClose = document.getElementById('mnavClose');
    var mnavHint  = document.getElementById('mnavHint');
    var mnavLabel = document.getElementById('mnavLabel');
    var mnavCards = document.getElementById('mnavCards');
    var mnavTabs  = [].slice.call(document.querySelectorAll('[data-mtab]'));

    /* card content per tab; wire descriptions to real copy in the build */
    var MENU = {
      services: { label: 'Services options', cards: [
        ['Certified translation', 'Official, stamped, and legally accepted translations'],
        ['Standard translation',  'High-fidelity translation for business or personal copy']
      ]},
      cover: { label: 'What we cover', cards: [
        ['Supported languages', 'Thirty plus languages, global and regional'],
        ['Supported documents', 'From contracts and certificates to manuals']
      ]},
      about: { label: 'About options', cards: [
        ['About us',     'Who we are and how we work'],
        ['How it works', 'The three steps from document to done'],
        ['Contact',      'Get in touch about a project']
      ]}
    };

    function renderTab(key){
      var tab = MENU[key];
      if(!tab || !mnavCards) return;
      mnavLabel.textContent = tab.label;
      mnavCards.innerHTML = tab.cards.map(function(c, i){
        return '<a class="mnav-card" href="#">' +
                 '<span class="dot"' + (i === 0 ? ' style="background:var(--accent)"' : '') + '></span>' +
                 '<span><b>' + c[0] + '</b><span>' + c[1] + '</span></span>' +
               '</a>';
      }).join('');
    }

    if(mnav && mnavOpen){
      function openMenu(){
        mnav.classList.add('open');
        mnavOpen.setAttribute('aria-expanded', 'true');
        document.documentElement.style.overflow = 'hidden';
      }
      function closeMenu(){
        mnav.classList.remove('open');
        mnavOpen.setAttribute('aria-expanded', 'false');
        document.documentElement.style.overflow = '';
      }
      on(mnavOpen, 'click', function(e){ e.stopPropagation(); openMenu(); });
      on(mnavClose, 'click', closeMenu);
      if(mnavHint) on(mnavHint, 'click', closeMenu);
      on(document, 'keydown', function(e){
        if((e.key === 'Escape' || e.keyCode === 27) && mnav.classList.contains('open')) closeMenu();
      });
      mnavTabs.forEach(function(tab){
        on(tab, 'click', function(){
          mnavTabs.forEach(function(t){ t.setAttribute('aria-selected', 'false'); });
          tab.setAttribute('aria-selected', 'true');
          renderTab(tab.getAttribute('data-mtab'));
        });
      });
      renderTab('services');
    }
  }

  function destroy(){
    for(var i = 0; i < bound.length; i++){
      bound[i][0].removeEventListener(bound[i][1], bound[i][2]);
    }
    bound = [];
    [].forEach.call(document.querySelectorAll('[data-dd], .cur-opt'), function(el){
      el.__atlasBound = false;
    });
    initialised = false;
  }

  global.AtlasNav = { init: init, destroy: destroy };

  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', init);
  }else{
    init();
  }

})(window, document);
