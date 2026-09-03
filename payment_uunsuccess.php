<?php include 'includes/header.php'; ?>

<section class="checkout-success">

    <div class="container px-0 checkout-success__container">

        <div class="checkout-success__card">

            <!-- SUCCESS ICON -->
            <div class="checkout-success__icon">
               <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
  <rect x="0.75" y="0.75" width="70.5" height="70.5" rx="35.25" stroke="#DF3F3F" stroke-width="1.5"/>
  <path d="M25 25L47 47M47 25L25 47" stroke="#DF3F3F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            </div>


            <!-- TITLE -->
            <h1 class="checkout-success__title">
Payment did not go through.            </h1>


            <!-- DESCRIPTION -->
            <p class="checkout-success__description">
               Nothing has been charged. Check the details and try again, or use a different card.
            </p>


            <!-- ORDER DETAILS -->
            <div class="checkout-success__details">

                <!-- ORDER REFERENCE -->
                <div class="checkout-success__row">

                    <span class="checkout-success__label">
                        Order reference
                    </span>

                    <span class="checkout-success__value">
                        AW-2026-0817
                    </span>

                </div>


                <!-- CERTIFIED TRANSLATION -->
                <div class="checkout-success__row">

                    <span class="checkout-success__label">
                        Certified translation
                    </span>

                    <span class="checkout-success__value">
                        English to Spanish, 3 pages
                    </span>

                </div>


                <!-- ESTIMATED DELIVERY -->
                <div class="checkout-success__row">

                    <span class="checkout-success__label">
                        Estimated delivery
                    </span>

                    <span class="checkout-success__value">
                        Thursday 13 August
                    </span>

                </div>


                <!-- TOTAL PAID -->
                <div class="checkout-success__row">

                    <span class="checkout-success__label">
                        Total paid
                    </span>

                    <span class="checkout-success__value">
                        $257.20
                    </span>

                </div>

            </div>


            <!-- ACTIONS -->
            <div class="checkout-success__actions">

                <button
                    type="button"
                    class="checkout-success__button checkout-success__button--primary"
                >
                    <span>
Try again                    </span>

                    <span class="checkout-success__button-arrow">

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


                <button
                    type="button"
                    class="checkout-success__button checkout-success__button--secondary"
                >
                    <span>
Contact support                    </span>

                    <span class="checkout-success__button-arrow">

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

            </div>

        </div>

    </div>

</section>

<?php include 'includes/footer.php'; ?>