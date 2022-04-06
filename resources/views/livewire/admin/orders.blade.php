<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 pt-4">
                                <h4>{{ $title ?? 'Замовлення' }}</h4>
                            </div>
                            <div class="col-md-4 text-center">
                                @if( config('settings.orders_by_location') && $isAdmin )
                                    <div class="form-group">
                                        <label>Локація</label>
                                        <input type="hidden" value="24" class="selectedCategoryId">
                                        <select wire:model="selectedLocation" class="form-control select_category">
                                            @foreach($locations as $location)
                                                <option value="{{ $location->key }}">{{ $location->city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                            <tr class="text-center">
                                <th>№ замовлення</th>
                                <th>Локація</th>
                                <th>Імя</th>
                                <th>Телефон</th>
                                <th>Адреса</th>
                                <th>Сума</th>
                                <th>Спосіб оплати</th>
                                <th>Статус</th>
                                <th>Дата замовлення</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr class='clickable-row' data-href='{{ route('admin.order.view', $order -> id) }}'>
                                    <td class="text-center text-bold">{{ $order -> id }}</td>
                                    <td>{{ $order->location->city }}</td>
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
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center"><h4>Замовлень немає</h4></td>
                                </tr>
                            @endforelse
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
</div>
