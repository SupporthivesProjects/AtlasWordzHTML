<?php include 'includes/header.php'; ?>

<!-- Dashboard Start -->
<section class="dashboard_s1">
    <div class="dashboard_c1 container">
        <label class="dashboard_s1label">My Account</label>
        <h1 class="dashboard_s1title">Welcome John!</h1>
        <a class="dashboard_signout">Sign out</a>
    </div>
</section>

<section class="dashboard_s2">
    <div class="dashboard_c2 container">
        <ul class="nav nav-pills dashboard_s2top" id="pills-tab" role="tablist">
            <li class="nav-item dashboard_s2btnmain" role="presentation">
                <button class="nav-link active dashboard_s2btn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <h4 class="tab_btntitle">Account details</h4>
                    <p class="tab_btnsubtitle">Your name, email address and password, plus the billing details we invoice against.</p>
                </button>
            </li>
            <li class="nav-item dashboard_s2btnmain"  role="presentation">
                <button class="nav-link dashboard_s2btn" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <h4 class="tab_btntitle">Your translations</h4>
                    <p class="tab_btnsubtitle">Every finished document, ready to download, kept available for twelve months after delivery.</p>
                </button>
            </li>
            <li class="nav-item dashboard_s2btnmain" role="presentation">
                <button class="nav-link dashboard_s2btn" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                    <h4 class="tab_btntitle">Order history</h4>
                    <p class="tab_btnsubtitle">What you ordered, what it cost, and a downloadable invoice for each one.</p>
                </button>
            </li>
        </ul>
        <div class="tab-content dashboard_s2bottom" id="pills-tabContent">
            <div class="tab-pane fade show active dash_tabcontent1" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">1</div>
            <div class="tab-pane fade dash_tabcontent2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div>
            <div class="tab-pane fade dash_tabcontent3" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">3</div>
        </div>
    </div>
</section>
<!-- Dashboard End -->

<?php include 'includes/footer.php'; ?>