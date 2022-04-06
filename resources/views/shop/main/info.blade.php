@extends('shop.layouts.shop.main_layout')
@section('subheader_title')
    Про нас
@endsection
@section('content')

{{--    <!-- About us start -->--}}
{{--    <div class="section">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}

{{--                <div class="col-lg-6 mb-lg-30 ct-single-img-wrapper">--}}
{{--                    <img src="/storage/{{ $data['info']->image ?? '' }}" alt="img">--}}
{{--                    <div class="ct-dots"></div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="section-title-wrap mr-lg-30">--}}
{{--                        <h5 class="custom-primary">About Us</h5>--}}
{{--                        <h2 class="title">Serving Pizzas By The Slice Since 1987</h2>--}}
{{--                        <p class="subtitle">--}}
{{--                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}
{{--                        </p>--}}
{{--                        <p class="subtitle">--}}
{{--                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s--}}
{{--                        </p>--}}
{{--                        <div class="signature">--}}
{{--                            <img src="shop/main/assets/img/signature.png" alt="signature">--}}
{{--                        </div>--}}
{{--                        {!!  $data['info']->text ?? '' !!}--}}
{{--                        <a href="menu-v1.html" class="btn-custom">Наше меню</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- About us End -->--}}
<div class="section">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 mb-lg-30 ct-single-img-wrapper">
                <img src="shop/main/assets/img/auth.jpg" alt="img">
                <div class="ct-dots"></div>
            </div>
            <div class="col-lg-6">
                <div class="section-title-wrap mr-lg-30">
                    <h5 class="custom-primary">About Us</h5>
                    <h2 class="title">Serving Pizzas By The Slice Since 1987</h2>
                    <p class="subtitle">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <p class="subtitle">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                    <a href="menu-v1.html" class="btn-custom">Check our Menu</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Infographics Start -->
<div class="section section-padding bg-cover bg-center bg-parallax dark-overlay dark-overlay-2" style="background-image: url('shop/main/assets/img/subheader-2.jpg')">
    <div class="container">
        <div class="section-title-wrap section-header text-center">
            <h2 class="title text-white">Our success Story</h2>
            <p class="subtitle text-white">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ct-infographic-item">
                    <i class="flaticon-employee"></i>
                    <h4>24,934</h4>
                    <p>Happy Customers</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ct-infographic-item">
                    <i class="flaticon-pizza-slice"></i>
                    <h4>65,317</h4>
                    <p>Pizzas Made</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ct-infographic-item">
                    <i class="flaticon-cheese"></i>
                    <h4>4,658</h4>
                    <p>Cheese Rolls</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ct-infographic-item">
                    <i class="flaticon-soda"></i>
                    <h4>67,335</h4>
                    <p>Drinks Served</p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Infographics End -->
<!-- Team members Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 mb-lg-30">
                <div class="section-title-wrap">
                    <h5 class="custom-primary">Our Backbone</h5>
                    <h2 class="title">Meet The Team</h2>
                    <p class="subtitle">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <p class="subtitle">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>
{{--                <a href="#" class="btn-custom">View All</a>--}}
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="ct-team-item">
                            <div class="ct-team-thumb">
                                <img src="shop/main/assets/img/team/1.jpg" alt="team">
                            </div>
                            <div class="ct-team-desc">
                                <h5>Miranda Blue</h5>
                                <span>Executive Chef</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="ct-team-item">
                            <div class="ct-team-thumb">
                                <img src="shop/main/assets/img/team/2.jpg" alt="team">
                            </div>
                            <div class="ct-team-desc">
                                <h5>Jonathan Flock</h5>
                                <span>Assistant Chef</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="ct-team-item">
                            <div class="ct-team-thumb">
                                <img src="shop/main/assets/img/team/3.jpg" alt="team">
                            </div>
                            <div class="ct-team-desc">
                                <h5>Mich Jean</h5>
                                <span>Assistant Chef</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="ct-team-item">
                            <div class="ct-team-thumb">
                                <img src="shop/main/assets/img/team/4.jpg" alt="team">
                            </div>
                            <div class="ct-team-desc">
                                <h5>Andrew Lumber</h5>
                                <span>Assistant Chef</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Team members End -->
<!-- Newsletter start -->
<section class="section bg-center bg-cover dark-overlay" style="background-image:url('shop/main/assets/img/bg/1.jpg')">
    <div class="container">

        <div class="ct-newsletter">

            <div class="section-title-wrap section-header">
                <h2 class="title">Join Our Newsletter</h2>
                <p class="subtitle">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                </p>
            </div>

            <form method="post">
                <input type="email" class="form-control" placeholder="Enter your email address" value="">
                <button type="submit" class="btn-custom primary" name="button"> Submit <i class="far fa-paper-plane"></i> </button>
            </form>

        </div>

    </div>
</section>
<!-- Newsletter End -->

{{--    <!-- Locations Wrapper Start -->--}}
{{--    <div class="section">--}}
{{--        <div class="container locations-wrapper">--}}

{{--            <div class="location-item">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="location-item-inner">--}}
{{--                            <img src="/storage/{{ $data['contacts']->image ?? '' }}" alt="location">--}}
{{--                            <div class="location-desc">--}}
{{--                                <h3>TISTO</h3>--}}
{{--                            </div>--}}
{{--                            <div class="location-info">--}}
{{--                                <div class="row">--}}
{{--                                    {!!  $data['contacts']->text ?? '' !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="ct-contact-map-wrapper">--}}
{{--                            <div id="map1" data-lat="51.5" data-lng="-0.09" class="ct-contact-map"></div>--}}
{{--                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1242.3845327781755!2d23.8485358!3d51.4807531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4723e50eedcc2a67%3A0x71714dff4f656d53!2z0J_RltGG0LXRgNGW0Y8gIlRpc3RvIg!5e0!3m2!1sru!2sua!4v1629471069741!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
{{--                            <a href="https://goo.gl/maps/uh1bLBcgu7dhpWN7A" target="_blank" class="btn-custom shadow-none">Дивитись на Google Maps</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- Locations Wrapper End -->--}}
@endsection

