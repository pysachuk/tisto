<div>
    @section('subheader_title')
        Кошик
    @endsection
    <!--Cart Start -->
    <section class="section">
        <div class="container">

            <!-- Cart Table Start -->
            <table class="ct-responsive-table">
                <thead>
                <tr>
                    <th>Товар</th>
                    <th>Ціна</th>
                    <th>Кількість</th>
                    <th>Сумма</th>
                    <th class="remove-item"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($cartItems as $item)
                    <tr class="cart_item" data-id="{{ $item->product->id }}">
                        <td data-title="Продукт">
                            <div class="cart-product-wrapper">
                                <img src="/storage/{{ $item -> product -> image->image }}" alt="prod1">
                                <div class="cart-product-body">
                                    <h6> <a href="#">{{ $item -> product->title }}</a> </h6>
                                </div>
                            </div>
                        </td>
                        <td data-title="Ціна"> <strong>{{ $item -> product->price }} грн</strong> </td>
                        <td class="quantity" data-title="Кількість">
                            <div class="input-group">
                            <span class="input-group-prepend">
                                <button type="button" wire:click="minus({{ $item->product }})" data-id="{{ $item->product->id }}" class="btn btn-outline-secondary btn-number cart_minus_count" data-type="minus" data-field="quant[1]">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                                <input type="text" data-id="{{ $item->product->id }}" name="quant[1]" class="form-control input-number qty" value="{{ $item -> quantity }}" min="1" max="10" readonly>
                                <span class="input-group-append">
                                <button type="button" wire:click="add({{ $item->product }})" data-id="{{ $item->product->id }}" class="btn btn-outline-secondary btn-number cart_add_count" data-type="plus" data-field="quant[1]">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                            </div>
                        </td>
                        <td data-title="Сума"> <strong class="product_total" data-id="{{ $item->product->id }}">{{ ($item->product->price * $item -> quantity) }} грн</strong> </td>
                        <td class="remove">
                            <button type="button" wire:click="removeProduct({{ $item->product }})" data-id="{{ $item->product->id }}" class="close-btn close-danger remove-from-cart">
                                <span></span>
                                <span></span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center"><h3>Кошик пустий</h3></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <!-- Cart Table End -->
        @if(! $cartItems -> isEmpty())
            <!-- Cart form Start -->
                <div class="row ct-cart-form">
                    <div class="offset-lg-6 col-lg-6">
                        <h4>Всього</h4>
                        <table>
                            <tbody>
                            <tr>
                                <th>Сума</th>
                                <td class="cart_total">{{ $cartTotal }} грн</td>
                            </tr>
                            <tr>
                                <th>Доставка</th>
                                <td> Безкоштовно!</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('order.checkout') }}" class="btn-custom primary btn-block">Оформити замовлення</a>
                    </div>
                </div>
                <!-- Cart form End -->
            @endif
{{--            <button wire:click="test" class="btn btn-success">OK</button>--}}
        </div>
    </section>
    <!-- Cart End -->
</div>
