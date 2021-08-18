<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from androthemes.com/themes/html/slices/menu-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Aug 2021 10:28:04 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Slices - Pizzeria HTML Template</title>

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

<!-- Customize Modal Start -->
<div class="modal fade" id="customizeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-bg" style="background-image: url('/shop/main/assets/img/blog/11.jpg')">

                <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                    <span></span>
                    <span></span>
                </button>

            </div>
            <div class="modal-body">

                <div class="customize-meta">
                    <h4 class="customize-title">Pepperoni Pizza <span class="custom-primary">13.99$</span> </h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                    </p>
                </div>

                <div class="customize-variations">

                    <div class="customize-size-wrapper">
                        <h5>Size: </h5>
                        <div class="customize-size active">
                            11"
                        </div>
                        <div class="customize-size">
                            16"
                        </div>
                        <div class="customize-size">
                            21"
                        </div>
                    </div>

                    <div class="row">

                        <!-- Variation Start -->
                        <div class="col-lg-4 col-12">
                            <div class="customize-variation-wrapper">
                                <i class="flaticon-bread-roll"></i>
                                <h5>Dough</h5>
                                <div class="customize-variation-item" data-price="0.00">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" checked id="regularDough" name="dough" class="custom-control-input">
                                        <label class="custom-control-label" for="regularDough">Regular</label>
                                    </div>
                                    <span>+0.00$</span>
                                </div>
                                <div class="customize-variation-item" data-price="2.00">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="thinDough" name="dough" class="custom-control-input">
                                        <label class="custom-control-label" for="thinDough">Hand Flipped</label>
                                    </div>
                                    <span>+2.00$</span>
                                </div>
                                <div class="customize-variation-item" data-price="4.00">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="multiGrainDough" name="dough" class="custom-control-input">
                                        <label class="custom-control-label" for="multiGrainDough">Multi Grain</label>
                                    </div>
                                    <span>+4.00$</span>
                                </div>
                            </div>
                        </div>
                        <!-- Variation End -->

                        <!-- Variation Start -->
                        <div class="col-lg-4 col-12">
                            <div class="customize-variation-wrapper">
                                <i class="flaticon-pizza-slice"></i>
                                <h5>Crust</h5>
                                <div class="customize-variation-item" data-price="4.00">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cheeseCrust" name="crust" class="custom-control-input">
                                        <label class="custom-control-label" for="cheeseCrust">Cheese</label>
                                    </div>
                                    <span>+4.00$</span>
                                </div>
                                <div class="customize-variation-item" data-price="3.25">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="butterCrust" name="crust" class="custom-control-input">
                                        <label class="custom-control-label" for="butterCrust">Butter</label>
                                    </div>
                                    <span>+3.25$</span>
                                </div>
                            </div>
                        </div>
                        <!-- Variation End -->

                        <!-- Variation Start -->
                        <div class="col-lg-4 col-12">
                            <div class="customize-variation-wrapper">
                                <i class="flaticon-pizza-and-cutted-slice"></i>
                                <h5>Add</h5>
                                <div class="customize-variation-item" data-price="2.00">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="addChicken">
                                        <label class="custom-control-label" for="addChicken">Chicken</label>
                                    </div>
                                    <span>+2.00$</span>
                                </div>
                                <div class="customize-variation-item" data-price="1.20">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="addFourCheese">
                                        <label class="custom-control-label" for="addFourCheese">Four Cheese</label>
                                    </div>
                                    <span>+1.20$</span>
                                </div>
                                <div class="customize-variation-item" data-price="0.75">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="addFreshMushroom">
                                        <label class="custom-control-label" for="addFreshMushroom">Fresh Mushroom</label>
                                    </div>
                                    <span>+0.75$</span>
                                </div>
                                <div class="customize-variation-item" data-price="0.25">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="addBellPepper">
                                        <label class="custom-control-label" for="addBellPepper">Bell Peppers</label>
                                    </div>
                                    <span>+0.25$</span>
                                </div>
                            </div>
                        </div>
                        <!-- Variation End -->

                    </div>
                </div>

                <div class="customize-controls">
                    <div class="qty">
                        <span class="qty-subtract"><i class="fas fa-minus"></i></span>
                        <input type="text" name="qty" value="1">
                        <span class="qty-add"><i class="fas fa-plus"></i></span>
                    </div>
                    <div class="customize-total" data-price="13.99">
                        <h5>Total Price: <span class="final-price custom-primary">13.99 <span>$</span> </span> </h5>
                    </div>
                </div>

                <button type="button" class="btn-custom btn-block">Order Now</button>

            </div>
        </div>
    </div>
</div>
<!-- Customize Modal End -->

{{--<!-- Cart Sidebar Start -->--}}
{{--<div class="cart-sidebar-wrapper">--}}
{{--    <aside class="cart-sidebar">--}}
{{--        <div class="cart-sidebar-header">--}}
{{--            <h3>Your Cart</h3>--}}
{{--            <div class="close-btn cart-trigger close-dark">--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="cart-sidebar-body">--}}
{{--            <div class="cart-sidebar-scroll">--}}
{{--                <div class="cart-sidebar-item">--}}
{{--                    <div class="media">--}}
{{--                        <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/1.png" alt="product"></a>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5> <a href="menu-item-v1.html" title="Pepperoni">Pepperoni</a> </h5>--}}
{{--                            <span>4x 9.99$</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-item-meta">--}}
{{--                        <span>14 Inches</span>--}}
{{--                        <span>Extra Cheese</span>--}}
{{--                        <span>Cheese Crust</span>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-price">--}}
{{--                        36.99$--}}
{{--                    </div>--}}
{{--                    <div class="close-btn">--}}
{{--                        <span></span>--}}
{{--                        <span></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="cart-sidebar-item">--}}
{{--                    <div class="media">--}}
{{--                        <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/2.png" alt="product"></a>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5> <a href="menu-item-v1.html" title="Vegetarian">Vegetarian</a> </h5>--}}
{{--                            <span>2x 5.99$</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-item-meta">--}}
{{--                        <span>14 Inches</span>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-price">--}}
{{--                        12.99$--}}
{{--                    </div>--}}
{{--                    <div class="close-btn">--}}
{{--                        <span></span>--}}
{{--                        <span></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="cart-sidebar-item">--}}
{{--                    <div class="media">--}}
{{--                        <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/3.png" alt="product"></a>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5> <a href="menu-item-v1.html" title="Italian Jalapeno Special">Italian Jalapeno Special</a> </h5>--}}
{{--                            <span>1x 12.99$</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-item-meta">--}}
{{--                        <span>14 Inches</span>--}}
{{--                        <span>Extra Cheese</span>--}}
{{--                        <span>Cheese Crust</span>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-price">--}}
{{--                        12.99$--}}
{{--                    </div>--}}
{{--                    <div class="close-btn">--}}
{{--                        <span></span>--}}
{{--                        <span></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="cart-sidebar-item">--}}
{{--                    <div class="media">--}}
{{--                        <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/4.png" alt="product"></a>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5> <a href="menu-item-v1.html" title="Barbeque Chicken">Barbeque Chicken</a> </h5>--}}
{{--                            <span>4x 9.99$</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-item-meta">--}}
{{--                        <span>12 Inches</span>--}}
{{--                        <span>Extra Cheese</span>--}}
{{--                        <span>Cheese Crust</span>--}}
{{--                        <span>Added Chicken</span>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-price">--}}
{{--                        36.99$--}}
{{--                    </div>--}}
{{--                    <div class="close-btn">--}}
{{--                        <span></span>--}}
{{--                        <span></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="cart-sidebar-item">--}}
{{--                    <div class="media">--}}
{{--                        <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/5.png" alt="product"></a>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5> <a href="menu-item-v1.html" title="Four Cheese">Four Cheese</a> </h5>--}}
{{--                            <span>2x 5.99$</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-item-meta">--}}
{{--                        <span>12 Inches</span>--}}
{{--                        <span>Added Chicken</span>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-price">--}}
{{--                        12.99$--}}
{{--                    </div>--}}
{{--                    <div class="close-btn">--}}
{{--                        <span></span>--}}
{{--                        <span></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="cart-sidebar-item">--}}
{{--                    <div class="media">--}}
{{--                        <a href="menu-item-v1.html"><img src="/shop/main/assets/img/prods-sm/6.png" alt="product"></a>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5> <a href="menu-item-v1.html" title="Swiss Mushroom">Swiss Mushroom</a> </h5>--}}
{{--                            <span>1x 12.99$</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-item-meta">--}}
{{--                        <span>12 Inches</span>--}}
{{--                        <span>Extra Cheese</span>--}}
{{--                        <span>Cheese Crust</span>--}}
{{--                        <span>Added Chicken</span>--}}
{{--                    </div>--}}
{{--                    <div class="cart-sidebar-price">--}}
{{--                        12.99$--}}
{{--                    </div>--}}
{{--                    <div class="close-btn">--}}
{{--                        <span></span>--}}
{{--                        <span></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="cart-sidebar-footer">--}}
{{--            <h4>Total: <span>299.99$</span> </h4>--}}
{{--            <a href="#" class="btn-custom">Checkout</a>--}}
{{--        </div>--}}
{{--    </aside>--}}
{{--    <div class="cart-sidebar-overlay cart-trigger">--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Cart Sidebar End -->--}}

<!-- Search Form Start-->
<div class="search-form-wrapper">
    <div class="search-trigger close-btn">
        <span></span>
        <span></span>
    </div>
    <form class="search-form" method="post">
        <input type="text" placeholder="Search..." value="">
        <button type="submit" class="search-btn">
            <i class="flaticon-magnifying-glass"></i>
        </button>
    </form>
</div>
<!-- Search Form End-->

<!-- Aside (Mobile Navigation) -->
<aside class="main-aside">
    <a class="navbar-brand" href="{{ route('shop.main') }}"> <img src="/shop/main/assets/img/logo.png" alt="logo"> </a>
    <div class="aside-scroll">
        <ul>
            <li class="menu-item menu-item-has-children">
                <a href="#">Home Pages</a>
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
                        <li> <a class="p-0" href="tel:+123456789"><i class="fas fa-phone mr-2"></i> +123 456 789</a> </li>
                    </ul>
                </div>

                <ul class="top-header-nav header-cta">
                    <li> <a href="menu-v1.html">Order Online</a> </li>
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
                    <a href="#">Home Pages</a>
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
                    <li class="search-dropdown-wrapper search-trigger">
                        <i class="flaticon-search"></i>
                    </li>
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
