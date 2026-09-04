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
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="dash_tabcontent1">
                    <div class="dash_tabcontent1a">
                        <div class="dash_tabcontent1atop">
                            <div class="dash_tabcontent1atitlebar">
                                <h4 class="dash_tabcontent1atitle">Personal profile</h4>
                                <p class="dash_tabcontent1asubtitle">Your name and the email we contact you on.</p>
                            </div>
                            <div class="mobile_none">
                                <button type="button" class="btn dashboard_formbtn">Save<img src="./img/dash_btnarrow.svg"></button>
                            </div>
                        </div>
                        <div class="dash_tabcontent1abottom w-100">
                            <div class="dash_textboxmain">
                                <label class="dash_textboxlabel" for="firstName">FIRST NAME</label>
                                <input type="text" class="form-control dash_textbox" id="firstName" value="John">
                            </div>
                            <div class="dash_textboxmain">
                                <label class="dash_textboxlabel" for="firstName">Last name</label>
                                <input type="text" class="form-control dash_textbox" id="firstName" value="Smith">
                            </div>
                            <div class="dash_textboxmain">
                                <label class="dash_textboxlabel" for="firstName">Primary email address</label>
                                <input type="text" class="form-control dash_textbox" id="firstName" value="john@company.com">
                            </div>
                        </div>
                        <div class="desktop_none w-100">
                            <button type="button" class="btn dashboard_formbtn w-100">Save<img src="./img/dash_btnarrow.svg"></button>
                        </div>
                    </div>
                     <div class="dash_tabcontent1a">
                        <div class="dash_tabcontent1atop">
                            <div class="dash_tabcontent1atitlebar">
                                <h4 class="dash_tabcontent1atitle">Billing details</h4>
                                <p class="dash_tabcontent1asubtitle">Used on your invoices. Matches what you enter at checkout.</p>
                            </div>
                            <div class="mobile_none">
                                <button type="button" class="btn dashboard_formbtn">Save<img src="./img/dash_btnarrow.svg"></button>
                            </div>
                        </div>
                        <div class="dash_tabcontent1abottom w-100">
                            <div class="dash_textboxmain">
                                <label class="dash_textboxlabel" for="firstName">Address line 1</label>
                                <input type="text" class="form-control dash_textbox" id="firstName" value="Manchester">
                            </div>
                            <div class="first_last">
                                <div class="dash_textboxmain">
                                    <label class="dash_textboxlabel" for="firstName">City</label>
                                    <input type="text" class="form-control dash_textbox" id="firstName" value="Smith">
                                </div>
                                <div class="dash_textboxmain">
                                    <label class="dash_textboxlabel" for="firstName">Postcode</label>
                                    <input type="text" class="form-control dash_textbox" id="firstName" value="M3 4LZ">
                                </div>
                            </div>
                            <div class="dash_textboxmain dash_selectmain">
                                <label class="dash_textboxlabel" for="country">COUNTRY</label>
                                <select class="form-control dash_textbox dash_select" id="country">
                                    <option value="uk">United Kingdom</option>
                                    <option value="us">United States</option>
                                    <option value="ca">Canada</option>
                                    <option value="au">Australia</option>
                                    <option value="in">India</option>
                                </select>
                                <img src="./img/drop_arrow.svg" class="dash_selectarrow" alt="">
                            </div>
                        </div>
                        <div class="desktop_none w-100">
                            <button type="button" class="btn dashboard_formbtn w-100">Save<img src="./img/dash_btnarrow.svg"></button>
                        </div>
                    </div>
                    <div class="dash_tabcontent1c">
                        <div class="dash_tabcontent1atop">
                            <div class="dash_tabcontent1atitlebar">
                                <h4 class="dash_tabcontent1atitle">Billing details</h4>
                                <p class="dash_tabcontent1asubtitle">Used on your invoices. Matches what you enter at checkout.</p>
                            </div>
                            <div class="mobile_none">
                                <button type="button" class="btn dashboard_formbtn w-100">Save<img src="./img/dash_btnarrow.svg"></button>
                            </div>
                        </div>
                        <div class="first_last2">
                            <div class="dash_textboxmain">
                                <label class="dash_textboxlabel" for="newPassword">New password</label>
                                <div class="password_box">
                                    <input type="password" class="form-control dash_textbox" id="newPassword" value="abcdef">
                                    <img src="./img/password_eye.svg" class="password_eye" alt="Show password">
                                </div>
                            </div>
                            <div class="dash_textboxmain">
                                <label class="dash_textboxlabel" for="confirmPassword">Confirm new password</label>
                                <div class="password_box">
                                    <input type="password" class="form-control dash_textbox" id="confirmPassword" value="abcdef">
                                    <img src="./img/password_eye.svg" class="password_eye" alt="Show password">
                                </div>
                            </div>
                        </div>
                        <div class="desktop_none w-100">
                            <button type="button" class="btn dashboard_formbtn w-100">Save<img src="./img/dash_btnarrow.svg"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade dash_tabcontent2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="dash_tabcontent2">
                    <h4 class="dash_tabcontent2title">Ready to download</h4>
                    <div class="dash_tabcontent2cardbar">
                        <div class="dash_tabcontent2card">
                            <div class="dash_tabcontent2cardtitlebar">
                                <p class="dash_tabcontent2cardtitle">Birth certificate, EN to ES</p>
                                <p class="dash_tabcontent2cardsubtitle">AW-2026-0317 · PDF and .docx</p>
                            </div>
                            <a class="dash_pendingbtn">Pending</a>
                        </div>
                        <div class="dash_tabcontent2card">
                            <div class="dash_tabcontent2cardtitlebar">
                                <p class="dash_tabcontent2cardtitle">Annual report, DE to EN</p>
                                <p class="dash_tabcontent2cardsubtitle">AW-2026-0796 · .docx</p>
                            </div>
                            <a class="dash_downloadbtn">Download</a>
                        </div>
                        <div class="dash_tabcontent2card">
                            <div class="dash_tabcontent2cardtitlebar">
                                <p class="dash_tabcontent2cardtitle">Marriage certificate, EN to AR</p>
                                <p class="dash_tabcontent2cardsubtitle">AW-2026-0754 · PDF and .docx</p>
                            </div>
                            <a class="dash_downloadbtn">Download</a>
                        </div>
                        <div class="dash_tabcontent2card">
                            <div class="dash_tabcontent2cardtitlebar">
                                <p class="dash_tabcontent2cardtitle">Employment contract, FR to EN</p>
                                <p class="dash_tabcontent2cardsubtitle">AW-2026-0711 • .docx</p>
                            </div>
                            <a class="dash_downloadbtn">Download</a>
                        </div>
                        <div class="dash_tabcontent2card">
                            <div class="dash_tabcontent2cardtitlebar">
                                <p class="dash_tabcontent2cardtitle">Academic transcript, EN to JA</p>
                                <p class="dash_tabcontent2cardsubtitle">AW-2026-0688 • PDF and .docx</p>
                            </div>
                            <a class="dash_downloadbtn">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade dash_tabcontent3" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="dash_tabcontent2">
                    <h4 class="dash_tabcontent2title">Your orders</h4>
                    <!-- Desktop Table -->
                    <div class="mobile_none">
                        <div class="table-responsive">
                            <table class="table dash_table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">REFERENCE</th>
                                        <th scope="col">SERVICE</th>
                                        <th scope="col">PLACED</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>AW-2026-0817</b></td>
                                        <td>Certified, EN to ES</td>
                                        <td>12 Aug 2026</td>
                                        <td>$96.00</td>
                                        <td><a href="#" class="dash_downloadbtn">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td>AW-2026-0796</td>
                                        <td>Standard, DE to EN</td>
                                        <td>04 Aug 2026</td>
                                        <td>$161.20</td>
                                        <td><a href="#" class="dash_downloadbtn">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td>AW-2026-0754</td>
                                        <td>Certified, EN to AR</td>
                                        <td>22 Jul 2026</td>
                                        <td>$64.00</td>
                                        <td><a href="#" class="dash_downloadbtn">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td>AW-2026-0711</td>
                                        <td>Standard, FR to EN</td>
                                        <td>09 Jul 2026</td>
                                        <td>$88.40</td>
                                        <td><a href="#" class="dash_downloadbtn">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td>AW-2026-0688</td>
                                        <td>Certified, EN to JA</td>
                                        <td>27 Jun 2026</td>
                                        <td>$128.00</td>
                                        <td><a href="#" class="dash_downloadbtn">Download</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Mobile Table -->
                    <div class="desktop_none">
                        <div class="mob_historybar">
                            <div class="mob_historycard">
                                <h5 class="mob_historycardtitle">AW-2026-0817</h5>
                                <div class="mob_historycardinner">
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Service</p>
                                        <p class="mob_historycardtotalamount">Standard, DE to EN</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Placed</p>
                                        <p class="mob_historycardtotalamount">04 Aug 2026</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Total</p>
                                        <p class="mob_historycardtotalamount">$161.20</p>
                                    </div>
                                </div>
                                <a href="#" class="dash_downloadbtn">Download</a>
                            </div>
                            <div class="mob_historycard">
                                <h5 class="mob_historycardtitle">AW-2026-0817</h5>
                                <div class="mob_historycardinner">
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Service</p>
                                        <p class="mob_historycardtotalamount">Standard, DE to EN</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Placed</p>
                                        <p class="mob_historycardtotalamount">04 Aug 2026</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Total</p>
                                        <p class="mob_historycardtotalamount">$161.20</p>
                                    </div>
                                </div>
                                <a href="#" class="dash_downloadbtn">Download</a>
                            </div>
                            <div class="mob_historycard">
                                <h5 class="mob_historycardtitle">AW-2026-0817</h5>
                                <div class="mob_historycardinner">
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Service</p>
                                        <p class="mob_historycardtotalamount">Standard, DE to EN</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Placed</p>
                                        <p class="mob_historycardtotalamount">04 Aug 2026</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Total</p>
                                        <p class="mob_historycardtotalamount">$161.20</p>
                                    </div>
                                </div>
                                <a href="#" class="dash_downloadbtn">Download</a>
                            </div>
                            <div class="mob_historycard">
                                <h5 class="mob_historycardtitle">AW-2026-0817</h5>
                                <div class="mob_historycardinner">
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Service</p>
                                        <p class="mob_historycardtotalamount">Standard, DE to EN</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Placed</p>
                                        <p class="mob_historycardtotalamount">04 Aug 2026</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Total</p>
                                        <p class="mob_historycardtotalamount">$161.20</p>
                                    </div>
                                </div>
                                <a href="#" class="dash_downloadbtn">Download</a>
                            </div>
                            <div class="mob_historycard">
                                <h5 class="mob_historycardtitle">AW-2026-0817</h5>
                                <div class="mob_historycardinner">
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Service</p>
                                        <p class="mob_historycardtotalamount">Standard, DE to EN</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Placed</p>
                                        <p class="mob_historycardtotalamount">04 Aug 2026</p>
                                    </div>
                                    <div class="mob_historycardtotalbar">
                                        <p class="mob_historycardtotaltitle">Total</p>
                                        <p class="mob_historycardtotalamount">$161.20</p>
                                    </div>
                                </div>
                                <a href="#" class="dash_downloadbtn">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Dashboard End -->

<?php include 'includes/footer.php'; ?>
<!-- Password JS -->
<script>
document.querySelectorAll('.password_eye').forEach(function(eye) {
    eye.addEventListener('click', function() {
        const input = this.parentElement.querySelector('.dash_textbox');
        if (input.type === 'password') {
            input.type = 'text';
            this.classList.add('visible');
        } else {
            input.type = 'password';
            this.classList.remove('visible');
        }
    });
});
</script>