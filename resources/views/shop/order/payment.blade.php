@extends('shop.layouts.shop.main_layout')
@section('content')
    <!-- Subheader Start -->
    <div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/subheader.jpg')">
        <div class="container">
            <div class="subheader-inner">
                <h1>Оплата</h1>
            </div>

        </div>
    </div>
    <!-- Subheader End -->

    <!--Cart Start -->
    <section class="section">
        <div class="container">
            <h4>Замовлення № {{ $order->id }} прийнято</h4>
            @if(isset($order->payment) && $order->payment->status == 'success')
                <p>Оплачено {{ $order->summ }} грн</p>
            @else
                <p>Оплатіть <b>{{ $order->summ }}</b> грн</p>
                {!! $button !!}
            @endif
        </div>
    </section>
@endsection
