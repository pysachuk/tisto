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
    @livewireStyles

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
                @if( auth()->check() )
                    <ul class="top-header-nav header-cta">
                        <li> <a href="{{ route('admin.home') }}" target="_blank"><i class="fa fa-user" aria-hidden="true">Адмінка</i></a> </li>
                    </ul>
                @endif
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
            </ul>

            <div class="header-controls">
                <ul class="header-controls-inner">
                    @livewire('cart-sidebar')
{{--                    <a href="{{ route('cart.index') }}">--}}
{{--                        <li class="cart-dropdown-wrapper cart-trigger">--}}
{{--                            <span class="cart-item-count">--}}
{{--                                {{ Session::has('cart_id') ? \Cart::session(session('cart_id'))->getTotalQuantity() : 0}}--}}
{{--                            </span>--}}
{{--                            <i class="flaticon-shopping-bag"></i>--}}
{{--                        </li>--}}
{{--                    </a>--}}
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
<!-- Subheader Start -->
<div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/subheader.jpg')">
    <div class="container">
        <div class="subheader-inner">
            <h1>@yield('subheader_title', 'Меню')</h1>
            <nav aria-label="breadcrumb">
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                    <li class="breadcrumb-item"><a href="#">Menu</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">Menu v1</li>--}}
{{--                </ol>--}}
            </nav>
        </div>

    </div>
</div>
<!-- Subheader End -->

@if(session()->has('message'))
    <script>
        var message = '{{ session()->get('message') }}';
    </script>
@endif
@yield('content')
<!-- Footer Start -->
<footer class="ct-footer footer-dark">
    <!-- Top Footer -->
    <div class="container">
        <div class="footer-top">
            <div class="footer-logo">
                <img src="/shop/main/assets/img/logo-light.png" alt="logo">
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
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
<script>
    if(typeof message !== "undefined")
    {
        Swal.fire(
            'Помилка',
             message,
            'info'
        );
    }
</script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script>
        $(".phone").mask("+38(099) 999-9999");
</script>
<script>
    Livewire.on('addedToCart', function (){
        $("body").toggleClass('cart-open');
    });
</script>
@yield('js')

</body>


<!-- Mirrored from androthemes.com/themes/html/slices/menu-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Aug 2021 10:31:26 GMT -->
</html>
