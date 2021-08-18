@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Заказы')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Заказы</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>№ заказа</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Адрес</th>
                                <th>Примечание</th>
                                <th>Сумма</th>
                                <th>Статус</th>
                                <th>Дата заказа</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $order -> id }}</td>
                                <td>{{ $order -> name }}</td>
                                <td>{{ $order -> phone }}</td>
                                <td>{{ $order -> address }}</td>
                                <td>{{ $order -> description }}</td>
                                <td>{{ $order -> summ }} грн</td>
                                <td>{{ $order -> status }}</td>
                                <td>{{ $order -> created_at }}</td>
                            </tr>
                            <tr class="expandable-body d-none">
                                <td colspan="8">
                                    <div class="container-fluid">
                                        <div class="card" >
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Продукт</th>
                                                        <th>Цена</th>
                                                        <th>Количество</th>
                                                        <th>Фото</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order -> orderProducts as $product)
                                                    <tr>
                                                        <td>{{ $product -> product -> title }}</td>
                                                        <td>{{ $product -> product -> price }} грн</td>
                                                        <td>{{ $product -> count }}</td>
                                                        <td><img src="/storage/{{ $product -> product -> image -> image }}" style="width: 100px"></td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="4">
                                                            <h4>Сумма: {{ $order -> summ  }} грн</h4>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <a href="#" class="btn btn-success">Одобрить</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

