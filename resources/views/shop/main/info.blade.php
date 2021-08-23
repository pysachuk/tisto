@extends('shop.layouts.shop.main_layout')
@section('content')
    <!-- Subheader Start -->
    <div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/subheader.jpg')">
        <div class="container">
            <div class="subheader-inner">
                <h1>Про нас</h1>
            </div>

        </div>
    </div>
    <!-- Subheader End -->

    <!-- About us start -->
    <div class="section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-lg-30 ct-single-img-wrapper">
                    <img src="/shop/main/assets/img/auth.jpg" alt="img">
                    <div class="ct-dots"></div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-wrap mr-lg-30">
                        <h5 class="custom-primary">Про нас</h5>
                        <h2 class="title">Serving Pizzas By The Slice Since 1987</h2>
                        <p class="subtitle">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                        <p class="subtitle">
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                        <a href="menu-v1.html" class="btn-custom">Наше меню</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- About us End -->

    <!-- Locations Wrapper Start -->
    <div class="section">
        <div class="container locations-wrapper">

            <div class="location-item">
                <div class="row">
                    <div class="col-md-6">
                        <div class="location-item-inner">
                            <img src="/shop/main/assets/img/locations/1.jpg" alt="location">
                            <div class="location-desc">
                                <h3>TISTO</h3>
                            </div>
                            <div class="location-info">
                                <div class="row">
                                    <div class="col-6">
                                        <span>с.Світязь</span>
                                        <span>вулиця Вереснева, 1</span>
                                        <span>Волинська область, Україна, 44021</span>
                                    </div>
                                    <div class="col-6">
                                        <span> Телефон: <a href="tel:+380980008050">(098) 000-8050</a> </span>
                                        <span> Email: <a href="#">admin@tisto.pp.ua</a> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ct-contact-map-wrapper">
{{--                            <div id="map1" data-lat="51.5" data-lng="-0.09" class="ct-contact-map"></div>--}}
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1242.3845327781755!2d23.8485358!3d51.4807531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4723e50eedcc2a67%3A0x71714dff4f656d53!2z0J_RltGG0LXRgNGW0Y8gIlRpc3RvIg!5e0!3m2!1sru!2sua!4v1629471069741!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            <a href="https://goo.gl/maps/uh1bLBcgu7dhpWN7A" target="_blank" class="btn-custom shadow-none">Дивитись на Google Maps</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Locations Wrapper End -->
@endsection

