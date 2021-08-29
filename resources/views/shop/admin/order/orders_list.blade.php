@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Заказы')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $title ?? 'Замовлення' }}</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                        <tr>
                            <th>№ заказа</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Адрес</th>
                            <th>Сумма</th>
                            <th>Метод оплаты</th>
                            <th>Статус</th>
                            <th>Дата заказа</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr  data-id="{{ $order -> id }}" class='clickable-row' data-href='{{ route('admin.order.view', $order -> id) }}'>
                                <td>{{ $order -> id }}</td>
                                <td>{{ $order -> name }}</td>
                                <td>{{ $order -> phone }}</td>
                                <td>{{ $order -> address }}</td>
                                <td>{{ $order -> summ }} грн</td>
                                <td>
                                    {!! ($order -> payment_method == 1) ? 'Готівка <i class="bi bi-currency-dollar"></i>': ''!!}
                                    {!!   ($order -> payment_method == 2) ? 'Картка <i class="bi bi-credit-card"></i>': ''!!}
                                </td>
                                @switch($order -> status)
                                    @case(1)
                                    <td class="bg-success text-center">Нове</td>
                                    @break
                                    @case(2)
                                    <td class="bg-primary text-center">Прийняте</td>
                                    @break
                                    @case(3)
                                    <td class="bg-danger text-center">Відхилене</td>
                                    @break
                                @endswitch
                                <td>{{ \Carbon\Carbon::parse($order -> created_at)->format('d/m/Y H:m')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
    <style>
        .clickable-row:hover
        {
            cursor: pointer;
        }
    </style>
@endsection
