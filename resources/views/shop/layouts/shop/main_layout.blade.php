<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TISTO - Меню')</title>

    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="/shop/main/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="/shop/main/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="/shop/main/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="/shop/main/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/shop/main/assets/css/plugins/slick-theme.css">
    <!-- Icon Fonts -->
    <link rel="stylesheet" href="/shop/main/assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/shop/main/assets/fonts/font-awesome/css/all.min.css">
    @yield('css')

    <!-- Slices Style sheet -->
    <link rel="stylesheet" href="/shop/main/assets/css/style.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

</head>

<body>

<!-- Preloader Start -->
<div class="ct-preloader">
    <div class="ct-preloader-inner">
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
</div>
<!-- Preloader End -->


<!-- Aside (Mobile Navigation) -->
<aside class="main-aside">
    <a class="navbar-brand" href="{{ route('shop.main') }}"> <img src="/shop/main/assets/img/logo.png" alt="logo"> </a>
    <div class="aside-scroll">
        <ul>
            <li class="menu-item">
                <a href="{{ route('shop.main') }}">Меню</a>
            </li>
            <li class="menu-item">
                <a href="{{ route('shop.info') }}">Про нас</a>
            </li>
        </ul>

    </div>

</aside>
<div class="aside-overlay aside-trigger"></div>

<!-- Header Start -->
<header class="main-header header-1 header-absolute header-light">

    <div class="top-header">
        <div class="container">
            <div class="top-header-inner">

                <div class="top-header-contacts">
                    <ul class="top-header-nav">
                        <li> <a class="p-0" href="tel:+380980008050"><i class="fas fa-phone mr-2"></i> +380 98 000 8050</a> </li>
                    </ul>
                </div>

                <ul class="top-header-nav header-cta">
                    <li> <a href="https://instagram.com/tisto.svityaz" target="_blank"><i class="fab fa-instagram fa-1x"> Instagram</i></a> </li>
                </ul>

            </div>
        </div>
    </div>

    <div class="container">
        <nav class="navbar">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('shop.main') }}"> <img src="/shop/main/assets/img/logo-light.png" alt="logo"> </a>
            <!-- Menu -->
            <ul class="navbar-nav">
                <li class="menu-item">
                    <a href="{{ route('shop.main') }}">Меню</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('shop.info') }}">Про нас</a>
                </li>
{{--                <li class="menu-item">--}}
{{--                    <a href="contact-us.html">Contact Us</a>--}}
{{--                </li>--}}
            </ul>

            <div class="header-controls">
                <ul class="header-controls-inner">
                    <a href="{{ route('cart.index') }}">
                        <li class="cart-dropdown-wrapper cart-trigger">
                            <span class="cart-item-count">
                                {{ Session::has('cart_id') ? \Cart::session(session('cart_id'))->getTotalQuantity() : 0}}
                            </span>
                            <i class="flaticon-shopping-bag"></i>
                        </li>
                    </a>
                </ul>
                <!-- Toggler -->
                <div class="aside-toggler aside-trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

        </nav>
    </div>

</header>
<!-- Header End -->



@yield('content')
<!-- Footer Start -->
<footer class="ct-footer footer-dark">
    <!-- Top Footer -->
    <div class="container">
        <div class="footer-top">
            <div class="footer-logo">
                <img src="/shop/main/assets/img/logo-light.png" alt="logo">
            </div>
{{--            <div class="footer-buttons">--}}
{{--                <a href="#"> <img src="/shop/main/assets/img/android.png" alt="download it on the app store"></a>--}}
{{--                <a href="#"> <img src="/shop/main/assets/img/ios.png" alt="download it on the app store"></a>--}}
{{--            </div>--}}
        </div>
    </div>

    <!-- Middle Footer -->
{{--    <div class="footer-middle">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">--}}
{{--                    <h5 class="widget-title">Information</h5>--}}
{{--                    <ul>--}}
{{--                        <li> <a href="index.html">Home</a> </li>--}}
{{--                        <li> <a href="blog-grid.html">Blog</a> </li>--}}
{{--                        <li> <a href="about-us.html">About Us</a> </li>--}}
{{--                        <li> <a href="menu-v1.html">Menu</a> </li>--}}
{{--                        <li> <a href="contact-us.html">Contact Us</a> </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">--}}
{{--                    <h5 class="widget-title">Top Items</h5>--}}
{{--                    <ul>--}}
{{--                        <li> <a href="#">Pepperoni</a> </li>--}}
{{--                        <li> <a href="#">Swiss Mushroom</a> </li>--}}
{{--                        <li> <a href="#">Barbeque Chicken</a> </li>--}}
{{--                        <li> <a href="#">Vegetarian</a> </li>--}}
{{--                        <li> <a href="#">Ham & Cheese</a> </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">--}}
{{--                    <h5 class="widget-title">Others</h5>--}}
{{--                    <ul>--}}
{{--                        <li> <a href="checkout.html">Checkout</a> </li>--}}
{{--                        <li> <a href="cart.html">Cart</a> </li>--}}
{{--                        <li> <a href="menu-item-v1.html">Product</a> </li>--}}
{{--                        <li> <a href="locations.html">Locations</a> </li>--}}
{{--                        <li> <a href="legal.html">Legal</a> </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-widget">--}}
{{--                    <h5 class="widget-title">Social Media</h5>--}}
{{--                    <ul class="social-media">--}}
{{--                        <li> <a href="#" class="facebook"> <i class="fab fa-facebook-f"></i> </a> </li>--}}
{{--                        <li> <a href="#" class="pinterest"> <i class="fab fa-pinterest-p"></i> </a> </li>--}}
{{--                        <li> <a href="#" class="google"> <i class="fab fa-google"></i> </a> </li>--}}
{{--                        <li> <a href="#" class="twitter"> <i class="fab fa-twitter"></i> </a> </li>--}}
{{--                    </ul>--}}
{{--                    <div class="footer-offer">--}}
{{--                        <p>Signup and get exclusive offers and coupon codes</p>--}}
{{--                        <a href="#" class="btn-custom btn-sm shadow-none">Sign Up</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
{{--            <ul>--}}
{{--                <li> <a href="#">Privacy Policy</a> </li>--}}
{{--                <li> <a href="#">Refund Policy</a> </li>--}}
{{--                <li> <a href="#">Cookie Policy</a> </li>--}}
{{--                <li> <a href="#">Terms & Conditions</a> </li>--}}
{{--            </ul>--}}
            <div class="footer-copyright">
                <p> Copyright &copy; 2021 Tisto </p>
                <a href="#" class="back-to-top">Вверх <i class="fas fa-chevron-up"></i> </a>
            </div>
        </div>
    </div>

</footer>
<!-- Footer End -->

<!-- Vendor Scripts -->
<script src="/shop/main/assets/js/plugins/jquery-3.4.1.min.js"></script>
<script src="/shop/main/assets/js/plugins/popper.min.js"></script>
<script src="/shop/main/assets/js/plugins/waypoint.js"></script>
<script src="/shop/main/assets/js/plugins/bootstrap.min.js"></script>
<script src="/shop/main/assets/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="/shop/main/assets/js/plugins/jquery.slimScroll.min.js"></script>
<script src="/shop/main/assets/js/plugins/imagesloaded.min.js"></script>
<script src="/shop/main/assets/js/plugins/jquery.steps.min.js"></script>
<script src="/shop/main/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="/shop/main/assets/js/plugins/isotope.pkgd.min.js"></script>
<script src="/shop/main/assets/js/plugins/slick.min.js"></script>

<!-- Slices Scripts -->
<script src="/shop/main/assets/js/main.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('js')

</body>


<!-- Mirrored from androthemes.com/themes/html/slices/menu-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Aug 2021 10:31:26 GMT -->
</html>
