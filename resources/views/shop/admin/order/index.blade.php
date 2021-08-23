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
                                <th>Сумма</th>
                                <th>Метод оплаты</th>
                                <th>Статус</th>
                                <th>Дата заказа</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr data-id="{{ $order -> id }}" data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $order -> id }}</td>
                                <td>{{ $order -> name }}</td>
                                <td>{{ $order -> phone }}</td>
                                <td>{{ $order -> address }}</td>
                                <td>{{ $order -> summ }} грн</td>
                                <td>{{ ($order -> payment_method == 1) ? 'Готівка': ''}}{{ ($order -> payment_method == 2) ? 'Карта': ''}}</td>
                                <td>
                                    @if($order -> status == 1)
                                        <span class="bg-success">NEW</span>
                                    @elseif($order -> status == 2)
                                        <p class="bg-danger">Старий</p>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($order -> created_at)->format('d/m/Y H:m')}}</td>
                            </tr>
                            <tr class="expandable-body d-none" data-id="{{ $order -> id }}">
                                <td colspan="8">
                                    <div class="container-fluid">
                                        <div class="card" >
                                            <!-- /.card-header -->
                                            @if($order -> description)
                                                <div class="card-header">
                                                    <b>Примітка: </b>
                                                    {{ $order -> description }}
                                                </div>
                                            @endif
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
                                                <button data-id="{{ $order -> id }}" type="submit" href="#" class="btn btn-success approve_order">Одобрить</button>
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
@section('js')
    <script>
        $(document).ready(function (){
            $('.approve_order').click(function (event){
                event.preventDefault();
                order_id = ($(this).attr('data-id'));
                approve_order();
            })
        });

        function approve_order()
        {
            $.ajax({
                url: "{{ route('admin.order.approve') }}",
                type: "POST",
                data: {
                    order_id: order_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    if(data == true)
                    {
                        order = $('tr[data-id='+order_id+']').fadeOut();
                    }
                }
            });
        }
    </script>
@endsection
