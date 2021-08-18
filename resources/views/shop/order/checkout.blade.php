@extends('shop.layouts.shop.main_layout')
@section('content')
<!-- Subheader Start -->
<div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/subheader.jpg')">
    <div class="container">
        <div class="subheader-inner">
            <h1>Замовлення</h1>
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
        </div>

    </div>
</div>
<!-- Subheader End -->

<!-- Checkout Start -->
<section class="section">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('cart.add_order') }}">
            @csrf
            <div class="row">
                <div class="col-xl-7">

                    <!-- Buyer Info -->
                    <h4>Ваші дані</h4>
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <label>Ім'я<span class="text-danger">*</span></label>
                            <input type="text" placeholder="Як до вас звертатись?" name="name" class="form-control" value="" required="">
                        </div>
                        <div class="form-group col-xl-6">
                            <label>Номер телефону<span class="text-danger">*</span></label>
                            <input type="text" placeholder="Номер телефону" name="phone" class="form-control" value="" required="">
                        </div>
                        <div class="form-group col-xl-12">
                            <label>Адреса доставки<span class="text-danger">*</span></label>
                            <input type="text" placeholder="Ваша адреса" name="address" class="form-control" value="" required="">
                        </div>
                        <div class="form-group col-xl-12 mb-0">
                            <label>Побажання</label>
                            <textarea name="description" rows="5" class="form-control" placeholder="Примітка(Не обов'язково)"></textarea>
                        </div>
                    </div>

                    <!-- /Buyer Info -->

                </div>
                <div class="col-xl-5 checkout-billing">
                    <!-- Order Details Start -->
                    <table class="ct-responsive-table">
                        <thead>
                        <tr>
                            <th>Продукт</th>
                            <th>Кількість</th>
                            <th>Ціна</th>
                            <th>Сумма</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart_items as $item)
                        <tr>
                            <td data-title="Product">
                                <div class="cart-product-wrapper">
                                    <div class="cart-product-body">
                                        <h6>{{ $item -> name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td data-title="Quantity">x{{ $item -> quantity }}</td>
                            <td data-title="Price">{{ $item -> price }} грн</td>
                            <td data-title="Total"> <strong>{{ ($item -> price * $item -> quantity) }} грн</strong> </td>
                        </tr>
                        @endforeach
                        <tr class="total">
                            <td>
                                <h6 class="mb-0">Загальна сумма</h6>
                            </td>
                            <td></td>
                            <td></td>
                            <td> <strong>{{ \Cart::getTotal() }} грн</strong> </td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn-custom primary btn-block">Замовити</button>

                    <!-- Order Details End -->

                </div>
            </div>
        </form>

    </div>
</section>
<!-- Checkout End -->
@endsection
