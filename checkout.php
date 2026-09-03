<?php include 'includes/header.php'; ?>
<section class="checkout-header">

    <div class="container checkout-header__container">

        <h1 class="checkout-header__title">
            Billing details
        </h1>

        <div class="checkout-progress">

            <!-- STEP 01 -->
            <div class="checkout-progress__item">

                <span class="checkout-progress__number">
                    01
                </span>

                <span class="checkout-progress__label">
                    Your order
                </span>

            </div>


            <!-- DOTTED LINE -->
            <span class="checkout-progress__line">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="1"
                    viewBox="0 0 40 1"
                    fill="none"
                >
                    <path
                        d="M0 0.5H40"
                        stroke="#F4EEE2"
                        stroke-opacity="0.3"
                        stroke-dasharray="4 5"
                    />
                </svg>

            </span>


            <!-- STEP 02 ACTIVE -->
            <div class="checkout-progress__item checkout-progress__item--active">

                <span class="checkout-progress__number">
                    02
                </span>

                <span class="checkout-progress__label">
                    Billing details
                </span>

            </div>


            <!-- DOTTED LINE -->
            <span class="checkout-progress__line">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="1"
                    viewBox="0 0 40 1"
                    fill="none"
                >
                    <path
                        d="M0 0.5H40"
                        stroke="#F4EEE2"
                        stroke-opacity="0.3"
                        stroke-dasharray="4 5"
                    />
                </svg>

            </span>


            <!-- STEP 03 -->
            <div class="checkout-progress__item">

                <span class="checkout-progress__number">
                    03
                </span>

                <span class="checkout-progress__label">
                    Payment
                </span>

            </div>

        </div>

    </div>

</section>

<section class="checkout-content">
    <img src="./img/papper_bg.png" alt="" class="translation-hero__tear" aria-hidden="true">

    <div class="container">

        <div class="checkout-layout">

            <!-- =====================================
                 BILLING FORM
            ====================================== -->

            <div class="checkout-form">

                <!-- ROW 01 -->
                <div class="checkout-form__row">

                    <div class="checkout-field">

                        <label
                            for="first-name"
                            class="checkout-field__label"
                        >
                            First name
                        </label>

                        <input
                            type="text"
                            id="first-name"
                            name="first_name"
                            class="checkout-field__input"
                            placeholder="John"
                        >

                    </div>


                    <div class="checkout-field">

                        <label
                            for="last-name"
                            class="checkout-field__label"
                        >
                            Last name
                        </label>

                        <input
                            type="text"
                            id="last-name"
                            name="last_name"
                            class="checkout-field__input"
                            placeholder="Smith"
                        >

                    </div>

                </div>


                <!-- ROW 02 -->
                <div class="checkout-form__row">

                    <div class="checkout-field">

                        <label
                            for="email"
                            class="checkout-field__label"
                        >
                            Email address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="checkout-field__input"
                            placeholder="john@company.com"
                        >

                    </div>


                    <div class="checkout-field">

                        <label
                            for="dob"
                            class="checkout-field__label"
                        >
                            Date of birth
                        </label>

                        <input
                            type="text"
                            id="dob"
                            name="date_of_birth"
                            class="checkout-field__input"
                            placeholder="DD/MM/YYYY"
                        >

                    </div>

                </div>


                <!-- ADDRESS -->
                <div class="checkout-field checkout-field--full">

                    <label
                        for="address"
                        class="checkout-field__label"
                    >
                        Address line 1
                    </label>

                    <input
                        type="text"
                        id="address"
                        name="address"
                        class="checkout-field__input"
                        placeholder="14 Bridgewater Street"
                    >

                </div>


                <!-- CITY / POSTCODE -->
                <div class="checkout-form__row">

                    <div class="checkout-field">

                        <label
                            for="city"
                            class="checkout-field__label"
                        >
                            City
                        </label>

                        <input
                            type="text"
                            id="city"
                            name="city"
                            class="checkout-field__input"
                            placeholder="Manchester"
                        >

                    </div>


                    <div class="checkout-field">

                        <label
                            for="postcode"
                            class="checkout-field__label"
                        >
                            Postcode
                        </label>

                        <input
                            type="text"
                            id="postcode"
                            name="postcode"
                            class="checkout-field__input"
                            placeholder="M3 4LZ"
                        >

                    </div>

                </div>


                <!-- COUNTRY -->
                <div class="checkout-field checkout-field--select">

                    <label
                        for="country"
                        class="checkout-field__label"
                    >
                        Country
                    </label>

                    <div class="checkout-field__select-wrapper">

                        <select
                            id="country"
                            name="country"
                            class="checkout-field__select"
                        >
                            <option value="uk">
                                United Kingdom
                            </option>

                            <option value="india">
                                India
                            </option>

                            <option value="usa">
                                United States
                            </option>

                            <option value="spain">
                                Spain
                            </option>
                        </select>


                        <span class="checkout-field__select-icon">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                            >
                                <path
                                    d="M0 2.5L5 7.5L10 2.5"
                                    stroke="#15332A"
                                    stroke-width="1.6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>

                        </span>

                    </div>

                </div>


                <!-- TERMS -->
                <div class="checkout-terms d-lg-flex d-md-flex d-none">

                    <label class="checkout-terms__checkbox">

                        <input
                            type="checkbox"
                            name="terms"
                        >

                        <span class="checkout-terms__checkmark"></span>

                        <span class="checkout-terms__text">
                            I agree to the
                            <a href="#">
                                Terms &amp; Conditions
                            </a>
                            and the
                            <a href="#">
                                Privacy Policy
                            </a>.
                        </span>

                    </label>

                </div>


                <!-- CAPTCHA -->
                <div class="checkout-captcha d-lg-flex d-md-flex d-none">

                    <img
                        src="./img/captcha.png"
                        alt="Security verification"
                        class="checkout-captcha__image"
                    >

                </div>

            </div>


            <!-- =====================================
                 ORDER SUMMARY
            ====================================== -->

            <aside class="checkout-summary">

                <h2 class="checkout-summary__title">
                    Order summary
                </h2>


                <div class="checkout-summary__items">

                    <!-- ITEM -->
                    <div class="checkout-summary__item">

                        <div class="checkout-summary__item-header">

                            <span class="checkout-summary__item-name">
                                Certified translation
                            </span>

                            <span class="checkout-summary__item-price">
                                $96.00
                            </span>

                        </div>

                        <span class="checkout-summary__item-meta">
                            English to Spanish · 3 pages
                        </span>

                    </div>


                    <!-- ITEM -->
                    <div class="checkout-summary__item">

                        <div class="checkout-summary__item-header">

                            <span class="checkout-summary__item-name">
                                Standard translation
                            </span>

                            <span class="checkout-summary__item-price">
                                $161.20
                            </span>

                        </div>

                        <span class="checkout-summary__item-meta">
                            German to English · 1,240 words
                        </span>

                    </div>


                    <!-- DELIVERY -->
                    <div class="checkout-summary__item">

                        <div class="checkout-summary__item-header">

                            <span class="checkout-summary__item-name">
                                Delivery
                            </span>

                            <span class="checkout-summary__item-price">
                                Included
                            </span>

                        </div>

                        <span class="checkout-summary__item-meta">
                            Standard, 72 hours
                        </span>

                    </div>


                    <!-- DISCOUNT -->
                    <div class="checkout-summary__item">

                        <div class="checkout-summary__item-header">

                            <span class="checkout-summary__item-name">
                                Discount applied
                            </span>

                            <span class="checkout-summary__item-price checkout-summary__item-price--discount">
                                -$25.72
                            </span>

                        </div>

                        <span class="checkout-summary__item-meta">
                            Code ATLAS10 ·
                            <button
                                type="button"
                                class="checkout-summary__remove"
                            >
                                Remove
                            </button>
                        </span>

                    </div>

                </div>


                <!-- DISCOUNT CODE -->
                <div class="checkout-discount">

                    <div class="checkout-discount__field">

                        <label
                            for="discount-code"
                            class="checkout-discount__label"
                        >
                            Discount code
                        </label>

                        <input
                            type="text"
                            id="discount-code"
                            name="discount_code"
                            class="checkout-discount__input"
                            placeholder="Enter your code"
                        >

                    </div>

                    <button
                        type="button"
                        class="checkout-discount__button"
                    >
                        Apply
                    </button>

                </div>


                <!-- TOTAL -->
                <div class="checkout-summary__total">

                    <span>
                        Total
                    </span>

                    <strong>
                        $257.20
                    </strong>

                </div>

                  <!-- TERMS -->
                <div class="checkout-terms d-lg-none d-md-none d-flex">

                    <label class="checkout-terms__checkbox">

                        <input
                            type="checkbox"
                            name="terms"
                        >

                        <span class="checkout-terms__checkmark"></span>

                        <span class="checkout-terms__text">
                            I agree to the
                            <a href="#">
                                Terms &amp; Conditions
                            </a>
                            and the
                            <a href="#">
                                Privacy Policy
                            </a>.
                        </span>

                    </label>

                </div>


                <!-- CAPTCHA -->
                <div class="checkout-captcha d-lg-none d-md-none d-flex">

                    <img
                        src="./img/captcha.png"
                        alt="Security verification"
                        class="checkout-captcha__image"
                    >

                </div>


                <!-- CONTINUE -->
                <button
                    type="button"
                    class="checkout-summary__checkout"
                >

                    <span>
                        Continue to payment
                    </span>

                    <span class="checkout-summary__arrow">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewBox="0 0 18 18"
                            fill="none"
                        >
                            <path
                                d="M2 9H16M10 15L16 9L10 3"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>

                    </span>

                </button>


                <!-- PAYMENT LOGOS -->
                <div class="checkout-summary__payment  d-lg-block d-md-block d-none">

                    <!-- Replace with your actual payment logo image if available -->
                    <img
                        src="./img/payment.png"
                        alt="Mastercard SecureCode Visa Verified by Visa"
                        class="checkout-summary__payment-image"
                    >

                </div>



            </aside>

        </div>

    </div>
  <!-- PAYMENT LOGOS -->
                <div class="checkout-summary__payment  d-lg-none d-md-none d-block">

                    <!-- Replace with your actual payment logo image if available -->
                    <img
                        src="./img/payment.png"
                        alt="Mastercard SecureCode Visa Verified by Visa"
                        class="checkout-summary__payment-image"
                    >

                </div>
</section>
<?php include 'includes/footer.php'; ?>