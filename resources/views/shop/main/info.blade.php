@extends('shop.layouts.shop.main_layout')
@section('content')
    <!-- Subheader Start -->
    <div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/storage/{{ $data['header_image'] }}')">
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
                    <img src="/storage/{{ $data['info'] -> image }}" alt="img">
                    <div class="ct-dots"></div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-wrap mr-lg-30">
                        {!!  $data['info'] -> text !!}
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
                            <img src="/storage/{{ $data['contacts'] -> image }}" alt="location">
                            <div class="location-desc">
                                <h3>TISTO</h3>
                            </div>
                            <div class="location-info">
                                <div class="row">
                                    {!!  $data['contacts'] -> text !!}
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

