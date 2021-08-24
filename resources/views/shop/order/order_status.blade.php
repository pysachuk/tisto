@extends('shop.layouts.shop.main_layout')
@section('content')
    <!-- Subheader Start -->
    <div class="subheader dark-overlay dark-overlay-2" style="background-image: url('/shop/main/assets/img/subheader.jpg')">
        <div class="container">
            <div class="subheader-inner">
                <h1>Статус замовлення</h1>
            </div>

        </div>
    </div>
    <!-- Subheader End -->

    <!--Cart Start -->
    <section class="section">
        <div class="container">
            @if(isset($data['status']) && $data['status'] == 'success')
                <h4>Замовлення № {{ $data['order_id'] }} успішно оплачено.</h4>
                <p>Дякуємо за замовлення. Очікуйте на дзвінок кур'єра. Смачного)</p>
            @elseif(isset($data['payment']) && $data['payment'] == 'money')
                <h4>Замовлення № {{ $data['order_id'] }} прийнято.</h4>
                <p>Дякуємо за замовлення. Очікуйте на дзвінок кур'єра. Смачного)</p>
            @elseif(isset($data['status']) && $data['status'] != 'success')
                <h4>Помилка оплати замовлення № {{ $data['order_id'] }} .</h4>
                <p>Упс. З оплатою якісь проблеми, з вами скоро звяжуться))</p>
                <p>Помилка: {{ $data['error'] }}</p>
            @endif
        </div>
    </section>
@endsection
