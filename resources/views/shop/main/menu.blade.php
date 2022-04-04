@extends('shop.layouts.shop.main_layout')
@section('content')
    <!-- Menu Categories Start -->
    <div class="ct-menu-categories menu-filter">
        <div class="container">
            <div class="menu-category-slider">
                <a href="#" data-filter="*" class="ct-menu-category-item active">
                    <div class="menu-category-thumb">
                        <img src="shop/main/assets/img/categories/6.jpg" alt="category">
                    </div>
                    <div class="menu-category-desc">
                        <h6>Усі</h6>
                    </div>
                </a>
                @foreach($categories as $category)
                    <a href="#" data-filter=".category-{{ $category->id }}" class="ct-menu-category-item">
                        <div class="menu-category-thumb">
                            <img src="{{ $category->image_url }}" alt="category">
                        </div>
                        <div class="menu-category-desc">
                            <h6>{{ $category->title }}</h6>
                        </div>
                    </a>
                @endforeach
{{--                <a href="#" data-filter=".sides" class="ct-menu-category-item">--}}
{{--                    <div class="menu-category-thumb">--}}
{{--                        <img src="shop/main/assets/img/categories/1.jpg" alt="category">--}}
{{--                    </div>--}}
{{--                    <div class="menu-category-desc">--}}
{{--                        <h6>Sides</h6>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#" data-filter=".pizzas" class="ct-menu-category-item">--}}
{{--                    <div class="menu-category-thumb">--}}
{{--                        <img src="shop/main/assets/img/categories/2.jpg" alt="category">--}}
{{--                    </div>--}}
{{--                    <div class="menu-category-desc">--}}
{{--                        <h6>Pizzas</h6>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#" data-filter=".salads" class="ct-menu-category-item">--}}
{{--                    <div class="menu-category-thumb">--}}
{{--                        <img src="shop/main/assets/img/categories/3.jpg" alt="category">--}}
{{--                    </div>--}}
{{--                    <div class="menu-category-desc">--}}
{{--                        <h6>Salads</h6>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#" data-filter=".pasta" class="ct-menu-category-item">--}}
{{--                    <div class="menu-category-thumb">--}}
{{--                        <img src="shop/main/assets/img/categories/7.jpg" alt="category">--}}
{{--                    </div>--}}
{{--                    <div class="menu-category-desc">--}}
{{--                        <h6>Pasta</h6>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#" data-filter=".desserts" class="ct-menu-category-item">--}}
{{--                    <div class="menu-category-thumb">--}}
{{--                        <img src="shop/main/assets/img/categories/4.jpg" alt="category">--}}
{{--                    </div>--}}
{{--                    <div class="menu-category-desc">--}}
{{--                        <h6>Desserts</h6>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#" data-filter=".beverages" class="ct-menu-category-item">--}}
{{--                    <div class="menu-category-thumb">--}}
{{--                        <img src="shop/main/assets/img/categories/5.jpg" alt="category">--}}
{{--                    </div>--}}
{{--                    <div class="menu-category-desc">--}}
{{--                        <h6>Beverages</h6>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="#" data-filter=".offers" class="ct-menu-category-item">--}}
{{--                    <div class="menu-category-thumb">--}}
{{--                        <img src="shop/main/assets/img/categories/8.jpg" alt="category">--}}
{{--                    </div>--}}
{{--                    <div class="menu-category-desc">--}}
{{--                        <h6>Offers</h6>--}}
{{--                    </div>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
    <!-- Menu Categories End -->
    <!-- Menu Wrapper Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="menu-container row">
                @foreach($products as $product)
                    <!-- Product Start -->
                    <div class="col-lg-4 col-md-6 category-{{ $product->category_id }}">
                        <div class="product">
                            <div class="product-thumb"> <img src="{{ $product->image->image }}" alt="menu item" /> </div>
                            <div class="product-body">
                                <div class="product-desc">
                                    <h4> <div >{{ $product->title }}</div> </h4>
                                    <p>{{ $product->description }}</p>
                                    <p class="product-price">{{ $product->price }} грн</p>
                                    <div class="favorite">
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                                <div class="product-controls">
                                    <a href="#" class="order-item btn-custom btn-sm shadow-none">В кошик <i class="fas fa-shopping-cart"></i> </a>
{{--                                    <a href="#" class="btn-custom secondary btn-sm shadow-none" data-toggle="modal" data-target="#customizeModal"> Customize <i class="fas fa-plus"></i> </a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product End -->
                @endforeach

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 beverages desserts">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/13.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Rum With Soda</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">3.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 desserts">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/12.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Chocolate Cookies</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">4.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 pizzas offers">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/2.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Vegetarian</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">9.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                                <a href="#" class="btn-custom secondary btn-sm shadow-none" data-toggle="modal" data-target="#customizeModal"> Customize <i class="fas fa-plus"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 pasta">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/11.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Sea Food Pasta</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">14.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                                <a href="#" class="btn-custom secondary btn-sm shadow-none" data-toggle="modal" data-target="#customizeModal"> Customize <i class="fas fa-plus"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 beverages offers">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/10.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Russian Beer</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">14.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 pizzas">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/3.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Four Cheese</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">13.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                                <a href="#" class="btn-custom secondary btn-sm shadow-none" data-toggle="modal" data-target="#customizeModal"> Customize <i class="fas fa-plus"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 salads sides">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/15.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Ceaser Salad</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">10.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                                <a href="#" class="btn-custom secondary btn-sm shadow-none" data-toggle="modal" data-target="#customizeModal"> Customize <i class="fas fa-plus"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6 sides">--}}
{{--                    <div class="product">--}}
{{--                        <a class="product-thumb" href="menu-item-v1.html"> <img src="shop/main/assets/img/prods-sm/14.png" alt="menu item" /> </a>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4> <a href="menu-item-v1.html">Chicken Wrap</a> </h4>--}}
{{--                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc</p>--}}
{{--                                <p class="product-price">5.99$</p>--}}
{{--                                <div class="favorite">--}}
{{--                                    <i class="far fa-heart"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none">Order <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                                <a href="#" class="btn-custom secondary btn-sm shadow-none" data-toggle="modal" data-target="#customizeModal"> Customize <i class="fas fa-plus"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}

            </div>

        </div>
    </div>
    <!-- Menu Wrapper End -->

{{--    <!-- Menu Wrapper Start -->--}}
{{--    <div class="section section-padding menu-v2">--}}
{{--        <div class="container">--}}
{{--            @foreach($categories as $category)--}}
{{--            <!-- Category Start -->--}}
{{--            <div class="menu-category dark-overlay dark-overlay-2" style="background-image: url('/storage/{{ $category -> image_url }}')">--}}
{{--                <h3>{{ $category -> title }}</h3>--}}
{{--                <p>{{ $category -> description }}</p>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                @foreach($category -> products as $product)--}}
{{--                <!-- Product Start -->--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="product">--}}
{{--                        <div class="favorite">--}}
{{--                            <i class="far fa-heart"></i>--}}
{{--                        </div>--}}
{{--                        <div class="product-thumb" href="menu-item-v1.html"> <img style="max-width: 220px" src="/storage/{{ $product -> image -> image }}" alt="menu item" /> </div>--}}
{{--                        <div class="product-body">--}}
{{--                            <div class="product-desc">--}}
{{--                                <h4 class="product_title" data-id="{{ $product -> id }}">{{ $product -> title }}</h4>--}}
{{--                                <p>{{ $product -> description }}</p>--}}
{{--                                <p class="product-price"><i class="fas fa-weight" style="color: silver;"></i> {{ $product -> weight }}г</p>--}}
{{--                            </div>--}}
{{--                            <div class="product-controls">--}}
{{--                                <p class="product-price">{{ $product -> price }} грн</p>--}}
{{--                                <a href="#" class="order-item btn-custom btn-sm shadow-none add_to_cart" data-id="{{ $product -> id }}">Додати <i class="fas fa-shopping-cart"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Product End -->--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--                <!-- Category End -->--}}
{{--            @endforeach--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Menu Wrapper End -->--}}
@endsection
@section('js')
{{--    <script src="/shop/main/shop/main/assets/js/menu.js"></script>--}}
@endsection
