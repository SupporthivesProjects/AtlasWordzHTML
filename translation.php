<?php include 'includes/header.php'; ?>
<section class="translation-hero">
    <div class="container translation-hero__container">

        <div class="translation-hero__content">

            <div class="translation-hero__eyebrow">
                Start a translation
            </div>

            <h1 class="translation-hero__title">
                Tell us what needs translating.
            </h1>

            <p class="translation-hero__description">
                Four steps. You see the price and the delivery date before you pay anything.
            </p>

        </div>


    </div>

</section>

<section class="translation-form">
    <img src="./img/papper_bg.png" alt="" class="translation-hero__tear" aria-hidden="true">

    <div class="container px-0 translation-form__container">
        <div class="container_translation-form">
            <!-- =========================
             STEP 01
        ========================== -->
            <div class="translation-step translation-step--type">

                <div class="translation-step__heading">
                    <span class="translation-step__number">
                        STEP 01
                    </span>

                    <h2>
                        What type of translation do you need?
                    </h2>
                </div>

                <div class="translation-type__options">

                    <label class="translation-option">

                        <input type="radio" name="translation_type" value="certified" checked>

                        <span class="translation-option__content">

                            <span class="translation-option__top">

                                <span class="translation-option__title">

                                    <span class="translation-radio"></span>

                                    <span>
                                        Certified translation
                                    </span>

                                </span>

                                <span class="translation-option__price">
                                    $32 per page
                                </span>

                            </span>

                            <span class="translation-option__description">
                                A signed certificate of accuracy, accepted by
                                government departments, universities and courts.
                            </span>

                        </span>

                    </label>


                    <label class="translation-option">

                        <input type="radio" name="translation_type" value="standard">

                        <span class="translation-option__content">

                            <span class="translation-option__top">

                                <span class="translation-option__title">

                                    <span class="translation-radio"></span>

                                    <span>
                                        Standard translation
                                    </span>

                                </span>

                                <span class="translation-option__price">
                                    $0.13 per word
                                </span>

                            </span>

                            <span class="translation-option__description">
                                Clear and natural, checked before delivery.
                            </span>

                        </span>

                    </label>

                </div>
            </div>


            <!-- =========================
             STEP 02
        ========================== -->
            <div class="translation-step translation-step--language">

                <div class="translation-step__heading">
                    <span class="translation-step__number">
                        STEP 02
                    </span>

                    <h2>
                        Which language pair?
                    </h2>
                </div>

                <div class="translation-language">

                    <div class="translation-select">
                        <label for="translate_from">
                            Translate from
                        </label>

                        <div class="translation-select__field">
                            <select id="translate_from" name="translate_from">
                                <option value="english">English</option>
                                <option value="french">French</option>
                                <option value="german">German</option>
                                <option value="spanish">Spanish</option>
                            </select>

                            <span class="translation-select__arrow">
                                <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>


                    <div class="translation-select">
                        <label for="translate_to">
                            Translate to
                        </label>

                        <div class="translation-select__field">
                            <select id="translate_to" name="translate_to">
                                <option value="spanish">Spanish</option>
                                <option value="english">English</option>
                                <option value="french">French</option>
                                <option value="german">German</option>
                            </select>

                            <span class="translation-select__arrow">
                                <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>

                </div>
            </div>


            <!-- =========================
             STEP 03
        ========================== -->
            <div class="translation-step translation-step--words">

                <div class="translation-step__heading">
                    <span class="translation-step__number">
                        STEP 03
                    </span>

                    <h2>
                        How many words or pages?
                    </h2>
                </div>

                <p class="translation-step__helper">
                    A page is 250 words, including numbers and spaces, that you
                    type before you pay anything.
                </p>

                <div class="qunatity_div">
                    <div class="translation-quantity">

                        <button type="button" class="translation-quantity__button" aria-label="Decrease quantity">
                            <img src="./img/minus.svg" alt="">
                        </button>

                        <span class="translation-quantity__value">
                            5
                        </span>

                        <button type="button" class="translation-quantity__button" aria-label="Increase quantity">
                            <img src="./img/plus.svg" alt="">
                        </button>

                    </div>

                    <div class="translation-words-count">
                        <span>pages.</span>
                        <span>1,250 words counted</span>
                    </div>
                </div>


                <p class="translation-step__note">
                    We count the words from your file and round to whole pages.
                    Certified one...
                </p>

                <div class="translation-upload">

                    <span class="translation-upload__label">
                        Upload your document
                    </span>

                    <div class="translation-upload__dropzone">

                        <span class="translation-upload__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <g clip-path="url(#clip0_14921_2122)">
                                    <path d="M8 12V0M13 5L8 0L3 5M0 16H16" stroke="#5C6E67" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_14921_2122">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>

                        <span>
                            Drop a pdf or docx, or browse
                        </span>

                    </div>

                    <input type="file" name="translation_document" class="translation-upload__input"
                        accept=".pdf,.doc,.docx">

                </div>

            </div>


            <!-- =========================
             STEP 04
        ========================== -->
            <div class="translation-step translation-step--delivery">

                <div class="translation-step__heading">
                    <span class="translation-step__number">
                        STEP 04
                    </span>

                    <h2>
                        How soon do you need it?
                    </h2>
                </div>
                <div class="translation-delivery">

                    <!-- Standard -->
                    <label class="translation-delivery__option">

                        <input type="radio" name="delivery" value="standard" checked>

                        <span class="translation-delivery__content">

                            <span class="translation-delivery__title">

                                <span class="translation-radio"></span>

                                <span>
                                    Standard
                                </span>

                            </span>

                            <span class="translation-delivery__time">
                                72 hours
                            </span>

                        </span>

                        <span class="translation-delivery__price">
                            Included
                        </span>

                    </label>


                    <!-- Urgent -->
                    <label class="translation-delivery__option">

                        <input type="radio" name="delivery" value="urgent">

                        <span class="translation-delivery__content">

                            <span class="translation-delivery__title">

                                <span class="translation-radio"></span>

                                <span>
                                    Urgent
                                </span>

                            </span>

                            <span class="translation-delivery__time">
                                36 to 48 hours
                            </span>

                        </span>

                        <span class="translation-delivery__price">
                            + $15.83
                        </span>

                    </label>

                </div>


                <div class="translation-notes">

                    <label for="translation_notes">
                        Anything we should know
                    </label>

                    <textarea id="translation_notes" name="translation_notes"
                        placeholder="Names, terminology, a deadline. Anything that affects the translation."></textarea>

                </div>

            </div>
        </div>

        <div class="order-summary">

    <h3 class="order-summary__title">
        Your order
    </h3>

    <div class="order-summary__details">

        <div class="order-summary__row">
            <span>Certified translation</span>
            <span>3 pages</span>
        </div>

        <div class="order-summary__row">
            <span>English to Spanish</span>
        </div>

        <div class="order-summary__row">
            <span>Standard delivery</span>
            <span>72 hours</span>
        </div>

        <div class="order-summary__row">
            <span>Estimated delivery</span>
            <span>Thu 13 Aug</span>
        </div>

        <div class="order-summary__row order-summary__row--total">
            <span>Total</span>
            <span>$96.00</span>
        </div>

    </div>


    <!-- Terms -->
    <div class="order-summary__terms">

        <label class="order-summary__checkbox">

            <input type="checkbox" id="terms">

            <span class="order-summary__checkmark"></span>

            <span class="order-summary__terms-text">
                I agree to the
                <a href="#">Terms &amp; Conditions</a>
                and the
                <a href="#">Privacy Policy</a>.
            </span>

        </label>

    </div>


    <!-- Buttons -->
    <div class="order-summary__actions">

        <button
            type="button"
            class="order-summary__button order-summary__button--primary"
        >
            <span>Add to cart</span>

            <span class="order-summary__arrow">
                <svg
                    width="14"
                    height="12"
                    viewBox="0 0 14 12"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M1 6H12"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                    />
                    <path
                        d="M8 1L13 6L8 11"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </span>
        </button>


        <button
            type="button"
            class="order-summary__button order-summary__button--secondary"
        >
            <span>Checkout now</span>

            <span class="order-summary__arrow">
                <svg
                    width="14"
                    height="12"
                    viewBox="0 0 14 12"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M1 6H12"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                    />
                    <path
                        d="M8 1L13 6L8 11"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </span>
        </button>

    </div>

</div>

    </div>

</section>
<?php include 'includes/footer.php'; ?>