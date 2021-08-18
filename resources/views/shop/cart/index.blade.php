@extends('shop.layouts.shop.main_layout')
@section('content')
    <!-- Subheader Start -->
    <div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/subheader.jpg')">
        <div class="container">
            <div class="subheader-inner">
                <h1>Кошик</h1>
            </div>

        </div>
    </div>
    <!-- Subheader End -->

    <!--Cart Start -->
    <section class="section">
        <div class="container">

            <!-- Cart Table Start -->
            <table class="ct-responsive-table">
                <thead>
                <tr>
                    <th class="remove-item"></th>
                    <th>Продукт</th>
                    <th>Ціна</th>
                    <th>Кількість</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart_items as $item)
                <tr class="cart_item" data-id="{{ $item -> id }}">
                    <td class="remove">
                        <button type="button" data-id="{{ $item -> id }}" class="close-btn close-danger remove-from-cart">
                            <span></span>
                            <span></span>
                        </button>
                    </td>
                    <td data-title="Product">
                        <div class="cart-product-wrapper">
                            <img src="/storage/{{ $item -> attributes -> image }}" alt="prod1">
                            <div class="cart-product-body">
                                <h6> <a href="#">{{ $item -> name }}</a> </h6>
{{--                                <p>21 Inch</p>--}}
                            </div>
                        </div>
                    </td>
                    <td data-title="Price"> <strong>{{ $item -> price }} грн</strong> </td>
                    <td class="quantity" data-title="Quantity">
                        <button type="button" data-id="{{ $item -> id }}" class="btn btn-success cart_add_count">
                            +
                        </button>
                        <input type="text" data-id="{{ $item -> id }}" class="qty form-control" value="{{ $item -> quantity }}">
                        <button type="button" data-id="{{ $item -> id }}"  class="btn btn-danger cart_minus_count">
                            -
                        </button>
                    </td>
                    <td data-title="Total"> <strong class="product_total" data-id="{{ $item -> id }}">{{ ($item -> price * $item -> quantity) }} грн</strong> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Cart Table End -->
            <!-- Cart form Start -->
            <div class="row ct-cart-form">
                <div class="offset-lg-6 col-lg-6">
                    <h4>Всього</h4>
                    <table>
                        <tbody>
                        <tr>
                            <th>Сумма</th>
                            <td class="cart_total">{{ \Cart::getTotal() }} грн</td>
                        </tr>
                        <tr>
                            <th>Доставка</th>
                            <td> Безкоштовно!</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('cart.checkout') }}" class="btn-custom primary btn-block">Оформити замовлення</a>
                </div>
            </div>
            <!-- Cart form End -->

        </div>
    </section>
    <!-- Cart End -->
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('.remove-from-cart').click(function (event){
                product_id = $(this).attr('data-id');
                remove_from_cart();
            });
            $('.cart_add_count').click(function (event){
                product_id = $(this).attr('data-id');
                cart_add_count();
            });
            $('.cart_minus_count').click(function (event){
                product_id = $(this).attr('data-id');
                cart_minus_count();
            });

        });

        function cart_minus_count()
        {
            $.ajax({
                url: "{{ route('cart.minus_count') }}",
                type: "POST",
                data: {
                    product_id: product_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data);
                    if(data['OK'] == 1)
                    {
                        $('.cart_total').text(data['cart_total']+' грн');
                        $('input.qty[data-id='+product_id+']').val(data['quantity']);
                        $('strong.product_total[data-id='+product_id+']').text(data['total']+' грн');
                    }

                }
            });
        }

        function cart_add_count()
        {
            $.ajax({
                url: "{{ route('cart.add_count') }}",
                type: "POST",
                data: {
                    product_id: product_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data);
                    if(data['OK'] == 1)
                    {
                        $('.cart_total').text(data['cart_total']+' грн');
                        $('input.qty[data-id='+product_id+']').val(data['quantity']);
                        $('strong.product_total[data-id='+product_id+']').text(data['total']+' грн');
                    }

                }
            });
        }

        function remove_from_cart()
        {
            $.ajax({
                url: "{{ route('cart.remove_item') }}",
                type: "POST",
                data: {
                    product_id: product_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data);
                    $('.cart_total').text(data['cart_total']+' грн');
                    if(data['OK'] == 1)
                    {
                        $('button.remove-from-cart[data-id='+product_id+']').parent().parent().fadeOut();
                        $('.cart-item-count').text(data['count']);
                    }

                }
            });
        }
    </script>
@endsection
