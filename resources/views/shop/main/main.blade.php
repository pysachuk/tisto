@extends('shop.layouts.main_layout')
@section('title', 'Главная')

@section('content')

    <div class="products">
        @foreach($categories as $category)
            <div class="home_container">
                <div class="home_background" style="background-image:url(/shop/images/categories.jpg)"></div>
                <div class="home_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    <div class="home_title">{{ $category -> title }}<span>.</span></div>
                                    <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="product_grid">
                            @foreach($category -> products as $product)
                                <!-- Product -->
                                    <div class="product">
                                        <div class="product_image"><img src="/shop/images/product_1.jpg" alt=""></div>
                                        <div class="product_extra product_new"><a href="/shop/categories.html">New</a></div>
                                        <div class="product_content">
                                            <div class="product_title"><a href="/shop/product.html">{{ $product -> title }}</a></div>
                                            <div class="product_price">{{ $product -> price }} UAH</div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
                        @endforeach
    </div>

@endsection
