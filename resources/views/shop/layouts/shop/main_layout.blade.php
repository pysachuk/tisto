<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from androthemes.com/themes/html/slices/menu-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Aug 2021 10:28:04 GMT -->
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
            <li class="menu-item menu-item-has-children">
                <a href="#">Головна</a>
                <ul class="submenu">
                    <li class="menu-item"> <a href="index.html">Home v111</a> </li>
                    <li class="menu-item"> <a href="home-v2.html">Home v2</a> </li>
                    <li class="menu-item"> <a href="home-v3.html">Home v3</a> </li>
                    <li class="menu-item"> <a href="home-v4.html">Home v4</a> </li>
                </ul>
            </li>
            <li class="menu-item menu-item-has-children">
                <a href="#">Blog</a>
                <ul class="submenu">
                    <li class="menu-item menu-item-has-children">
                        <a href="blog-grid.html">Blog Archive</a>
                        <ul class="submenu">
                            <li class="menu-item"> <a href="blog-grid.html">Grid View</a> </li>
                            <li class="menu-item"> <a href="blog-list.html">List View</a> </li>
                            <li class="menu-item"> <a href="blog-masonry.html">Masonry</a> </li>
                            <li class="menu-item"> <a href="blog-full-width.html">Full Width</a> </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="blog-single.html">Blog Single</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item menu-item-has-children">
                <a href="#">Pages</a>
                <ul class="submenu">
                    <li class="menu-item"> <a href="about-us.html">About Us</a> </li>
                    <li class="menu-item"> <a href="login.html">Login</a> </li>
                    <li class="menu-item"> <a href="register.html">Sign Up</a> </li>
                    <li class="menu-item"> <a href="checkout.html">Checkout</a> </li>
                    <li class="menu-item"> <a href="cart.html">Cart</a> </li>

                    <li class="menu-item"> <a href="legal.html">Legal</a> </li>
                    <li class="menu-item"> <a href="404.html">Error 404</a> </li>
                </ul>
            </li>
            <li class="menu-item menu-item-has-children">
                <a href="#">Menu</a>
                <ul class="submenu">
                    <li class="menu-item"> <a href="menu-v1.html">Menu v1</a> </li>
                    <li class="menu-item"> <a href="menu-v2.html">Menu v2</a> </li>
                    <li class="menu-item"> <a href="menu-item-v1.html">Menu Item v1</a> </li>
                    <li class="menu-item"> <a href="menu-item-v2.html">Menu Item v2</a> </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="locations.html">Locations</a>
            </li>
            <li class="menu-item">
                <a href="contact-us.html">Contact Us</a>
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
                    <li> <a href="{{ route('shop.main') }}">Замовити онлайн</a> </li>
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
                <li class="menu-item menu-item-has-children">
                    <a href="#">Головна</a>
                    <ul class="submenu">
                        <li class="menu-item"> <a href="index.html">Home v1</a> </li>
                        <li class="menu-item"> <a href="home-v2.html">Home v2</a> </li>
                        <li class="menu-item"> <a href="home-v3.html">Home v3</a> </li>
                        <li class="menu-item"> <a href="home-v4.html">Home v4</a> </li>
                    </ul>
                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="submenu">
                        <li class="menu-item menu-item-has-children">
                            <a href="blog-grid.html">Blog Archive</a>
                            <ul class="submenu">
                                <li class="menu-item"> <a href="blog-grid.html">Grid View</a> </li>
                                <li class="menu-item"> <a href="blog-list.html">List View</a> </li>
                                <li class="menu-item"> <a href="blog-masonry.html">Masonry</a> </li>
                                <li class="menu-item"> <a href="blog-full-width.html">Full Width</a> </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="blog-single.html">Blog Single</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="submenu">
                        <li class="menu-item"> <a href="about-us.html">About Us</a> </li>
                        <li class="menu-item"> <a href="login.html">Login</a> </li>
                        <li class="menu-item"> <a href="register.html">Sign Up</a> </li>
                        <li class="menu-item"> <a href="checkout.html">Checkout</a> </li>
                        <li class="menu-item"> <a href="cart.html">Cart</a> </li>

                        <li class="menu-item"> <a href="legal.html">Legal</a> </li>
                        <li class="menu-item"> <a href="404.html">Error 404</a> </li>
                    </ul>
                </li>
                <li class="menu-item menu-item-has-children mega-menu-wrapper">
                    <a href="#">Menu</a>
                    <ul class="submenu">
                        <li>
                            <div class="container">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="mega-menu-item">
                                            <h5>Building a Pizza</h5>
                                            <p>
                                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                                                making it over 2000 years old.
                                            </p>
                                            <a href="menu-item-v2.html" class="btn-custom secondary shadow-none btn-sm">Build your Pizza</a>
                                        </div>
                                    </div>
                                    <div class="offset-lg-1 col-lg-3">
                                        <div class="mega-menu-item">
                                            <h5>Menu Pages</h5>
                                            <a href="menu-v1.html">Menu v1</a>
                                            <a href="menu-v2.html">Menu v2</a>
                                            <a href="#" class="coming-soon">Menu v3 <span>Coming Soon</span> </a>
                                            <a href="#" class="coming-soon">Menu v4 <span>Coming Soon</span> </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mega-menu-item">
                                            <h5>Menu Item Pages</h5>
                                            <a href="menu-item-v1.html">Menu Item v1</a>
                                            <a href="menu-item-v2.html">Menu Item v2</a>
                                            <a href="#" class="coming-soon">Menu Item v3 <span>Coming Soon</span></a>
                                        </div>
                                    </div>
                                    <div class="col-12 mega-menu-promotion-wrapper">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mega-menu-promotion">
                                                    <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/1.png" alt="pizza"></a>
                                                    <div class="mega-menu-promotion-text">
                                                        <h4><a href="menu-item-v1.html">Pepperoni</a></h4>
                                                        <span>$12.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mega-menu-promotion">
                                                    <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/2.png" alt="pizza"></a>
                                                    <div class="mega-menu-promotion-text">
                                                        <h4><a href="menu-item-v1.html">Vegetarian</a></h4>
                                                        <span>$9.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mega-menu-promotion">
                                                    <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/3.png" alt="pizza"></a>
                                                    <div class="mega-menu-promotion-text">
                                                        <h4><a href="menu-item-v1.html">Ham & Cheese</a></h4>
                                                        <span>$13.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mega-menu-promotion">
                                                    <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/4.png" alt="pizza"></a>
                                                    <div class="mega-menu-promotion-text">
                                                        <h4><a href="menu-item-v1.html">Specialty</a></h4>
                                                        <span>$13.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="locations.html">Locations</a>
                </li>
                <li class="menu-item">
                    <a href="contact-us.html">Contact Us</a>
                </li>
            </ul>

            <div class="header-controls">
                <ul class="header-controls-inner">
                    <a href="{{ route('cart.index') }}">
                        <li class="cart-dropdown-wrapper cart-trigger">
                            <span class="cart-item-count">
                                {{isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : 0}}
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
            <div class="footer-buttons">
                <a href="#"> <img src="/shop/main/assets/img/android.png" alt="download it on the app store"></a>
                <a href="#"> <img src="/shop/main/assets/img/ios.png" alt="download it on the app store"></a>
            </div>
        </div>
    </div>

    <!-- Middle Footer -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">
                    <h5 class="widget-title">Information</h5>
                    <ul>
                        <li> <a href="index.html">Home</a> </li>
                        <li> <a href="blog-grid.html">Blog</a> </li>
                        <li> <a href="about-us.html">About Us</a> </li>
                        <li> <a href="menu-v1.html">Menu</a> </li>
                        <li> <a href="contact-us.html">Contact Us</a> </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">
                    <h5 class="widget-title">Top Items</h5>
                    <ul>
                        <li> <a href="#">Pepperoni</a> </li>
                        <li> <a href="#">Swiss Mushroom</a> </li>
                        <li> <a href="#">Barbeque Chicken</a> </li>
                        <li> <a href="#">Vegetarian</a> </li>
                        <li> <a href="#">Ham & Cheese</a> </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer-widget">
                    <h5 class="widget-title">Others</h5>
                    <ul>
                        <li> <a href="checkout.html">Checkout</a> </li>
                        <li> <a href="cart.html">Cart</a> </li>
                        <li> <a href="menu-item-v1.html">Product</a> </li>
                        <li> <a href="locations.html">Locations</a> </li>
                        <li> <a href="legal.html">Legal</a> </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-widget">
                    <h5 class="widget-title">Social Media</h5>
                    <ul class="social-media">
                        <li> <a href="#" class="facebook"> <i class="fab fa-facebook-f"></i> </a> </li>
                        <li> <a href="#" class="pinterest"> <i class="fab fa-pinterest-p"></i> </a> </li>
                        <li> <a href="#" class="google"> <i class="fab fa-google"></i> </a> </li>
                        <li> <a href="#" class="twitter"> <i class="fab fa-twitter"></i> </a> </li>
                    </ul>
                    <div class="footer-offer">
                        <p>Signup and get exclusive offers and coupon codes</p>
                        <a href="#" class="btn-custom btn-sm shadow-none">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <ul>
                <li> <a href="#">Privacy Policy</a> </li>
                <li> <a href="#">Refund Policy</a> </li>
                <li> <a href="#">Cookie Policy</a> </li>
                <li> <a href="#">Terms & Conditions</a> </li>
            </ul>
            <div class="footer-copyright">
                <p> Copyright &copy; 2020 <a href="#">AndroThemes</a> All Rights Reserved. </p>
                <a href="#" class="back-to-top">Back to top <i class="fas fa-chevron-up"></i> </a>
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

@yield('js')

</body>


<!-- Mirrored from androthemes.com/themes/html/slices/menu-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Aug 2021 10:31:26 GMT -->
</html>
