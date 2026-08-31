<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtlasWordz</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./img/tg-icon.svg">
    <link rel="stylesheet" href="uiframe/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="uiframe/css/slick.css">
    <link rel="stylesheet" href="uiframe/css/slick-theme.css">
    <link rel="stylesheet" href="css/tstyle.css">
    <link rel="stylesheet" href="css/medhns.css">
    <link rel="stylesheet" href="css/diksha.css">
    <link rel="stylesheet" href="css/dhiraj.css">
    <link rel="stylesheet" href="css/dhirajresponsive.css">
    <link rel="stylesheet" href="css/sakch.css">
    <link rel="stylesheet" href="css/sakdam.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/rstyle.css">
    <link rel="stylesheet" href="uiframe/css/font-awesome.min.css">
    <link rel="stylesheet" href="uiframe/css/animate.min.css">
    <link href="uiframe/css/aos.css" rel="stylesheet">
  </head>
  <body>
  
  <div class="main-div">
    <header class="header-top fixed-top" id="header-top">
      <nav class="navbar navbar-expand-lg">
        <div class="container p-mo">
         <div class="logo-mo-div">
            <a class="navbar-brand" href="#">
              <img src="./img/m-logo.svg" alt="" class="img-fluid d-lg-none d-md-none d-block  " id="logo">
              <img src="./img/brand.svg" alt="" class="img-fluid d-lg-block d-md-block d-none  ">
            </a>
            <div class="cart-mo-top-btn">
              <div class="cart-mo-top">
                <a class="cart-dec" href="cart.php">
                  <img src="./img/cart.svg" class="img-fluid">
                </a>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" id="navbar-toggler-icon"></span>
              </button>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="top-bar d-block d-lg-none d-md-block"></div>
            <ul class="navbar-nav navbar-nav-one m-auto">
              <li class="nav-item">
                <div class="dropdown services-drop">
                  <button class="nav-link btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Services
                  </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="#">
                          Certified translation
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">Standard translation</a>
                      </li>
                    </ul>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown services-drop">
                  <button class="nav-link btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    What we cover
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Supported languages</a></li>
                    <li><a class="dropdown-item" href="#">Supported documents</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact_us.php">Contact</a>
              </li>
            </ul>
            <div class="navbar-mo d-block d-lg-none d-md-block">
              <ul class="navbar-nav navbar-nav-two m-auto">
                  <li class="nav-item">
                    <a class="nav-link btn btn-ser-ser active" id="btn-ser-ser">
                      Services
                    </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link btn-ser-cover" id="btn-ser-cover">
                        What we cover
                      </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Contact</a>
                  </li>
              </ul>
              <div class="btn-ser-ser-box show" id="btn-ser-ser-box">
                <h5>Services options</h5>
                <ul>
                    <li>
                      <h6>Certified translation</h6>
                      <p>
                        Official, stamped, and 
                        legally accepted translations
                      </p>
                    </li>
                    <li>
                        <h6>Certified translation</h6>
                        <p>
                          Official, stamped, and 
                          legally accepted translations
                        </p>
                    </li>
                </ul>
              </div>
              <div class="btn-ser-ser-box" id="btn-ser-cover-box">
                <h5>What we cover options</h5>
                <ul>
                    <li>
                      <h6>Supported languages</h6>
                      <p>
                        30 languages, plus regional 
                        dialects sourced on request
                      </p>
                    </li>
                    <li>
                        <h6>Supported documents</h6>
                        <p>
                          Certificates, contracts, 
                          transcripts, reports and more
                        </p>
                    </li>
                </ul>
              </div>
            </div>
            <div class="d-flex d-right-mo" role="search">
              <div class="nav-item dropdown d-currency-mo dropdown-toggle-cur">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./img/flag1.svg" class="img-fluid  "> GBP 
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item active" href="#">
                      <img src="./img/flag2.svg" class="img-fluid  ">
                      <div>
                        <h6>USD</h6>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <img src="./img/flag3.svg" class="img-fluid  ">
                      <div>
                        <h6>EUR</h6>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <img src="./img/flag4.svg" class="img-fluid  ">
                      <div>
                        <h6>GBP</h6>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <a class="nav-link cart-dec" href="cart.php">
                  <div class="count-cart">3</div>
                 <img src="./img/Icon.svg" class="img-fluid  ">
              </a>
              <a class="btn btn-login" href="signup.php">Sign in / up</a>
            </div>
          </div>
        </div>
      </nav>
   </header>
  
  