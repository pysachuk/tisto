@section('title', 'TISTO - Замовлення')
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Деталі замовлення № {{ $order -> id }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Локація:</td>
                                <td><b>{{ $order->location->city }}</b></td>
                            </tr>
                            <tr>
                                <td>Імя:</td>
                                <td><b>{{ $order -> name }}</b></td>
                            </tr>
                            <tr>
                                <td>Телефон:</td>
                                <td><b>{{ $order -> phone }}</b></td>
                            </tr>
                            <tr>
                                <td>Адреса:</td>
                                <td><b>{{ $order -> address }}</b></td>
                            </tr>
                            <tr>
                                <td>Метод оплати:</td>
                                <td>
                                    <b>
                                        {!! ($order -> payment_method == 1) ? 'Готівка <i class="bi bi-currency-dollar"></i>' : '' !!}
                                        {!! ($order -> payment_method == 2) ? 'Картка <i class="bi bi-credit-card"></i>' : '' !!}
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td>Статус:</td>
                                <td>
                                    @switch($order -> status)
                                        @case(1)
                                        <b class="text-success">Нове</b>
                                        @break
                                        @case(2)
                                        <b class="text-primary">Прийняте</b>
                                        @break
                                        @case(3)
                                        <b class="text-danger">Відхилено</b>
                                        @break
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td>Дата замовлення:</td>
                                <td><b>{{ \Carbon\Carbon::parse($order -> created_at)->format('d/m/Y H:m')}}</b></td>
                            </tr>
                            @if(isset($order -> payment -> status) && $order -> payment -> status == 'success')
                                <tr>
                                    <td>Оплата:</td>
                                    <td class="bg-success"><b>Оплачено карткою</b></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    @if($order -> description)
                        <div class="card-footer">
                            <h5>Коментар:</h5>
                            <p class="card-text">{{ $order -> description }}</p>
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                @if($order->status !== \App\Models\Order::STATUS_APPROVED)
                                    <button type="button" wire:click="approveConfirm({{ $order }})"   class="btn btn-success accept_order">Прийняти</button>
                                @endif
                                @if($order->status !== \App\Models\Order::STATUS_REJECTED)
                                    <button type="button" wire:click="approveReject({{ $order }})"  class="btn btn-danger reject_order">Відхилити</button>
                                @endif
                                @if((isset($order -> payment -> status) &&  $order -> payment -> status == 'success') || $order -> payment_method == 2)
                                    <a href="#" class="btn btn-outline-info check_pay" data-id="{{ $order -> id }}">Деталі оплати</a>
                                @endif
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.orders', ['status' => 'new']) }}"><button class="btn btn-dark">До замовлень</button></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Замовлені товари</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Ціна</th>
                                <th>Кількість</th>
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
                                    <h4>Сумма: <b>{{ $order -> summ  }}</b> грн</h4>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal pay_status_modal" tabindex="-1" role="dialog">

    </div>
{{--    @endsection--}}
{{--    @section('js')--}}
{{--        <script>--}}
{{--            $(document).ready(function (){--}}
{{--                $('.check_pay').click(function (event){--}}
{{--                    event.preventDefault();--}}
{{--                    order_id = ($(this).attr('data-id'));--}}
{{--                    check_pay();--}}
{{--                })--}}
{{--                $('.accept_order').click(function (event){--}}
{{--                    event.preventDefault();--}}
{{--                    Swal.fire({--}}
{{--                        // title: 'Ви впевнені?',--}}
{{--                        text: "Прийняти це замовлення?",--}}
{{--                        icon: 'success',--}}
{{--                        showCancelButton: true,--}}
{{--                        confirmButtonColor: '#3085d6',--}}
{{--                        cancelButtonColor: '#d33',--}}
{{--                        confirmButtonText: 'Так!',--}}
{{--                        cancelButtonText: 'Ні'--}}
{{--                    }).then((result) => {--}}
{{--                        console.log(result)--}}
{{--                        if (result.isConfirmed) {--}}
{{--                            $('.form_approve').submit();--}}
{{--                        }--}}
{{--                    })--}}
{{--                })--}}
{{--                $('.reject_order').click(function (event){--}}
{{--                    event.preventDefault();--}}
{{--                    Swal.fire({--}}
{{--                        text: "Відхилити це замовлення?",--}}
{{--                        icon: 'error',--}}
{{--                        showCancelButton: true,--}}
{{--                        confirmButtonColor: '#3085d6',--}}
{{--                        cancelButtonColor: '#d33',--}}
{{--                        confirmButtonText: 'Так!',--}}
{{--                        cancelButtonText: 'Ні'--}}
{{--                    }).then((result) => {--}}
{{--                        console.log(result)--}}
{{--                        if (result.isConfirmed) {--}}
{{--                            $('.form_reject').submit();--}}
{{--                        }--}}
{{--                    })--}}
{{--                })--}}
{{--            })--}}

{{--            function check_pay()--}}
{{--            {--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('admin.order.payStatus') }}",--}}
{{--                    type: "POST",--}}
{{--                    data: {--}}
{{--                        order_id: order_id--}}
{{--                    },--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    },--}}
{{--                    success: (data) => {--}}
{{--                        $('.pay_status_modal').html(data);--}}
{{--                        $('.pay_status_modal').modal('show');--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        </script>--}}
</div>
