@extends('shop.layouts.shop.main_layout')
@section('content')
    <!-- Subheader Start -->
    <div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/subheader.jpg')">
        <div class="container">
            <div class="subheader-inner">
                <h1>Меню</h1>
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="#">Menu</a></li>--}}
{{--                        <li class="breadcrumb-item active" aria-current="page">Menu v2</li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
            </div>

        </div>
    </div>
    <!-- Subheader End -->

    <!-- Menu Wrapper Start -->
    <div class="section section-padding menu-v2">
        <div class="container">
            @foreach($categories as $category)
            <!-- Category Start -->
            <div class="menu-category dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/categories-lg/1.jpg')">
                <h3>{{ $category -> title }}</h3>
                <p>{{ $category -> description }}</p>
            </div>
            <div class="row">
                @foreach($category -> products as $product)
                <!-- Product Start -->
                <div class="col-lg-4 col-md-6">
                    <div class="product">
                        <div class="favorite">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="product-thumb" href="menu-item-v1.html"> <img style="max-width: 220px" src="/storage/{{ $product -> image -> image }}" alt="menu item" /> </div>
                        <div class="product-body">
                            <div class="product-desc">
                                <h4 class="product_title" data-id="{{ $product -> id }}">{{ $product -> title }}</h4>
                                <p>{{ $product -> description }}</p>
{{--                                <a href="#" class="btn-custom light btn-sm shadow-none" data-toggle="modal" data-target="#customizeModal"> Customize <i class="fas fa-plus"></i> </a>--}}
                            </div>
                            <div class="product-controls">
                                <p class="product-price">{{ $product -> price }} грн</p>
                                <a href="#" class="order-item btn-custom btn-sm shadow-none add_to_cart" data-id="{{ $product -> id }}">Додати <i class="fas fa-shopping-cart"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product End -->
                @endforeach
            </div>
                <!-- Category End -->
            @endforeach

        </div>
    </div>
    <!-- Menu Wrapper End -->
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('.add_to_cart').click(function (event){
                event.preventDefault();
                product_id = $(this).attr('data-id');
                product_title = $('.product_title[data-id='+product_id+']').text();
                add_to_cart();
            })
        });

        function add_to_cart()
        {
            let qty = 1;
            $.ajax({
                url: "{{ route('addToCart') }}",
                type: "POST",
                data: {
                    id: product_id,
                    qty: qty,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    if(data['OK'] == 1)
                    {
                        $('.cart-item-count').text(data['count']);
                        Swal.fire({
                            icon: "success",
                            title: '<strong>'+product_title+'</strong>',
                            html:
                                'Додано до кошика',
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText:
                                '<a href="{{ route('cart.index') }}" style="color: white;"><i class="fas fa-shopping-cart"></i> Кошик</a>',
                            cancelButtonText:
                                '<b><i class="fas fa-chevron-left"></i> Назад до меню</b>',
                            timer: 3000,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    }
                }
            });
        }
    </script>
@endsection
