<?php include 'includes/header.php'; ?>
        
        <section style="padding: 0%;">
            <img src="./img/contact_head.png" alt="" class="contact_img mobile_none_sk">
            <img src="./img/contact_head_ph.png" alt="" class="contact_img desk_none_sk">
            <div class="contact_outer">
                <div class="contact_inner">
                    <p class="contact_p">Contact us</p>
                    <h2 class="contact_head">How to reach us.</h2>
                    <p class="contact_p2">Send a message and we will reply within 48 hours. </p>
                </div>
                <div class="mobile_none_sk">
                    <div class="contact_inner2">
                        <div class="contact_inside">
                            <p class="contact_p3">Email</p>
                            <p class="contact_p4">hello@atlaswordz.com</p>
                        </div>
                        <div class="contact_line_div"></div>
                        <div class="contact_inside">
                            <p class="contact_p3">Phone</p>
                            <p class="contact_p4">+1 (503) 555 0142</p>
                        </div>
                        <div class="contact_line_div"></div>
                        <div class="contact_inside">
                            <p class="contact_p3">Address</p>
                            <p class="contact_p4">123, somewhere street, city, ABC 123</p>
                        </div>
                    </div>
                </div>
                <div class="contact_inner3">
                    <div class="contact_input_div">
                        <div class="contact_div_input">
                            <p class="contact_input_p">Full name</p>
                            <input type="text" class="contact_input" placeholder="John Smith">
                        </div>
                        <div class="contact_div_input">
                            <p class="contact_input_p">Email address</p>
                            <input type="text" class="contact_input" placeholder="john@company.com">
                        </div>
                    </div>
                    <div class="contact_div_input">
                        <p class="contact_input_p">Email address</p>
                        <input type="text" class="contact_input" placeholder="john@company.com">
                    </div>
                    <div class="contact_div_input">
                        <p class="contact_input_p">Email address</p>
                        <textarea name="" id="" class="contact_text" placeholder="Any additional information that may help."></textarea>
                    </div>
                    <div class="contact_div_last">
                        <div class="contact_div_inn">
                            <div class="form-check con_form_check">
                                <input class="form-check-input cont_check_input" type="checkbox" value="" id="checkDefault">
                                <label class="form-check-label cont_check_label" for="checkDefault">
                                    I agree to the <a href="">Terms & Conditions</a> and the <a href="">Privacy Policy</a>.
                                </label>
                            </div>
                            <img src="./img/cont_reCAPTCHA_v2_checkbox.png" alt="" class="cont_img_captcha">
                        </div>
                        <button class="btn cont_btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Send message
                            <div class="con_arrow_div">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M2 9H16M10 15L16 9L10 3" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="desk_none_sk w-100">
                    <div class="contact_inner2">
                        <div class="contact_inside">
                            <p class="contact_p3">Email</p>
                            <p class="contact_p4">hello@atlaswordz.com</p>
                        </div>
                        <div class="contact_line_div"></div>
                        <div class="contact_inside">
                            <p class="contact_p3">Phone</p>
                            <p class="contact_p4">+1 (503) 555 0142</p>
                        </div>
                        <div class="contact_line_div"></div>
                        <div class="contact_inside">
                            <p class="contact_p3">Address</p>
                            <p class="contact_p4">123, somewhere street, city, ABC 123</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered cont_modal_outer">
                <div class="modal-content contact_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
                        <rect x="0.75" y="0.75" width="62.5" height="62.5" rx="31.25" stroke="#2F8168" stroke-width="1.5"/>
                        <path d="M20 33L28 41L45 22" stroke="#2F8168" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="contact_modal_p">Message sent.</p>
                    <p class="contact_modal_p2">Thanks, we have it. We will reply within 48 hours.</p>
                    <button class="btn con_modal_btn">
                        <span>Back to site</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M2 9H16M10 15L16 9L10 3" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

 <?php include 'includes/footer.php'; ?>