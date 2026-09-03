<?php include 'includes/header.php'; ?>

<section class="cart-header">

    <div class="container cart-header__container">

        <!-- Title -->
        <h1 class="cart-header__title">
            Your cart
        </h1>


        <!-- Progress -->
        <div class="cart-progress">

            <!-- STEP 01 -->
            <div class="cart-progress__item cart-progress__item--active">

                <span class="cart-progress__number">
                    01
                </span>

                <span class="cart-progress__label">
                    Your order
                </span>

            </div>


            <!-- DOTTED LINE -->
            <span class="cart-progress__line">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="1" viewBox="0 0 40 1" fill="none">
                    <path d="M0 0.5H40" stroke="#F4EEE2" stroke-opacity="0.3" stroke-dasharray="4 5" />
                </svg>

            </span>


            <!-- STEP 02 -->
            <div class="cart-progress__item">

                <span class="cart-progress__number">
                    02
                </span>

                <span class="cart-progress__label">
                    Billing details
                </span>

            </div>


            <!-- DOTTED LINE -->
            <span class="cart-progress__line">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="1" viewBox="0 0 40 1" fill="none">
                    <path d="M0 0.5H40" stroke="#F4EEE2" stroke-opacity="0.3" stroke-dasharray="4 5" />
                </svg>

            </span>


            <!-- STEP 03 -->
            <div class="cart-progress__item">

                <span class="cart-progress__number">
                    03
                </span>

                <span class="cart-progress__label">
                    Payment
                </span>

            </div>

        </div>

    </div>

</section>

<section class="cart-content">
    <img src="./img/papper_bg.png" alt="" class="translation-hero__tear" aria-hidden="true">

    <div class="container px-0">

        <div class="cart-layout">

            <!-- =========================
                 LEFT — CART ITEMS
            ========================== -->
            <div class="cart-items">

                <!-- CART ITEM 01 -->
                <div class="cart-item-card">

                    <div class="cart-item-card__header">

                        <h2 class="cart-item-card__title">
                            Certified translation
                        </h2>

                        <div class="cart-item-card__right">

                            <span class="cart-item-card__price">
                                $96.00
                            </span>

                            <button type="button" class="cart-item-card__remove">
                                Remove
                            </button>

                        </div>

                    </div>


                    <div class="cart-item-card__details">

                        <div class="cart-item-card__detail">

                            <span class="cart-item-card__label">
                                Language pair
                            </span>

                            <span class="cart-item-card__value">
                                English to Spanish
                            </span>

                        </div>


                        <div class="cart-item-card__detail">

                            <span class="cart-item-card__label">
                                Amount
                            </span>

                            <span class="cart-item-card__value">
                                3 pages, 712 words
                            </span>

                        </div>


                        <div class="cart-item-card__detail">

                            <span class="cart-item-card__label">
                                Delivery
                            </span>

                            <span class="cart-item-card__value">
                                Standard, 72 hours
                            </span>

                        </div>

                    </div>

                </div>


                <!-- CART ITEM 02 -->
                <div class="cart-item-card">

                    <div class="cart-item-card__header">

                        <h2 class="cart-item-card__title">
                            Standard translation
                        </h2>

                        <div class="cart-item-card__right">

                            <span class="cart-item-card__price">
                                $161.20
                            </span>

                            <button type="button" class="cart-item-card__remove">
                                Remove
                            </button>

                        </div>

                    </div>


                    <div class="cart-item-card__details">

                        <div class="cart-item-card__detail">

                            <span class="cart-item-card__label">
                                Language pair
                            </span>

                            <span class="cart-item-card__value">
                                German to English
                            </span>

                        </div>


                        <div class="cart-item-card__detail">

                            <span class="cart-item-card__label">
                                Amount
                            </span>

                            <span class="cart-item-card__value">
                                1,240 words
                            </span>

                        </div>


                        <div class="cart-item-card__detail">

                            <span class="cart-item-card__label">
                                Delivery
                            </span>

                            <span class="cart-item-card__value">
                                Standard, 72 hours
                            </span>

                        </div>

                    </div>

                </div>


                <!-- ADD DOCUMENT -->
                <button type="button" class="cart-add-document">
                    <span class="cart-add-document__plus">
                        +
                    </span>

                    <span>
                        Add another document
                    </span>
                </button>

            </div>


            <!-- =========================
                 RIGHT — ORDER SUMMARY
            ========================== -->
            <aside class="cart-summary">

                <h2 class="cart-summary__title">
                    Order summary
                </h2>


                <div class="cart-summary__details">

                    <div class="cart-summary__rows">

                        <div class="cart-summary__row">
                            <span>Subtotal</span>
                            <span>$257.20</span>
                        </div>

                        <div class="cart-summary__row">
                            <span>Delivery</span>
                            <span>Included</span>
                        </div>

                    </div>


                    <div class="cart-summary__total">

                        <span>
                            Total at checkout
                        </span>

                        <strong>
                            $257.20
                        </strong>

                    </div>

                </div>


                <button type="button" class="cart-summary__checkout">
                    <span>
                        Go to checkout
                    </span>

                    <span class="cart-summary__arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M2 9H16M10 15L16 9L10 3" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>

                </button>


                <!-- PAYMENT LOGOS -->
                <div class="cart-summary__payment">
                    <img src="./img/payment.png" alt="" class="">

                </div>


                <p class="cart-summary__security">
                    Payment happens on our provider’s secure page.
                    We never see or store your card details.
                </p>

            </aside>

        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>