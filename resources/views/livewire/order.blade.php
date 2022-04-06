<div>
@section('subheader_title')
    Замовлення
@endsection

        <!-- Checkout Start -->
        <section class="section">
            <div class="container">
                <form wire:submit.prevent="createOrder">
                    @csrf
                    <div class="row">
                        <div class="col-xl-7">
                            <h4>Спосіб оплати:</h4>
                            <div class="row form-check">
                                <div class="form-group col-xl-6">
                                    <input wire:model="payment_method" class="form-check-input" type="radio" name="payment_method" value="1" id="money" checked>
                                    <label class="form-check-label" for="money">Готівкою(кур'єру)</label>
                                </div>
                                <div class="form-group col-xl-6">
                                    <input wire:model="payment_method" class="form-check-input" type="radio" name="payment_method" value="2" id="cart" >
                                    <label class="form-check-label" for="cart">Карта(онлайн)</label>
                                </div>
                                @error('payment_method') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <!-- Buyer Info -->
                            <h4>Ваші дані</h4>
                            <div class="row">
                                <div class="form-group col-xl-12">
                                    <label>Локація <span class="text-danger">*</span></label>
                                    <select wire:model="location_key"  class="form-control">
                                        @foreach($locations as $location)
                                            <option value="{{ $location->key }}">{{ $location->city }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_key') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-xl-6">
                                    <label>Ім'я<span class="text-danger">*</span></label>
                                    <input wire:model="name" type="text" placeholder="Як до вас звертатись?" name="name" class="form-control" value="" required="">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-xl-6">
                                    <label>Номер телефону<span class="text-danger">*</span></label>
                                    <input wire:model="phone" type="text" placeholder="+380999999999" name="phone" class="form-control phone" value="" >
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-xl-12">
                                    <label>Адреса доставки<span class="text-danger">*</span></label>
                                    <input wire:model="address" type="text" placeholder="Ваша адреса" name="address" class="form-control" value="" required="">
                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-xl-12 mb-0">
                                    <label>Побажання</label>
                                    <textarea wire:model="description" name="description" rows="5" class="form-control" placeholder="Коментар(Не обов'язково)"></textarea>
                                    @error('description') <span class="error">{{ $message }}</span> @enderror
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
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td data-title="Product">
                                            <div class="cart-product-wrapper">
                                                <div class="cart-product-body">
                                                    <h6>{{ $item->product->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-title="Кількість">x{{ $item->quantity }}</td>
                                        <td data-title="Ціна">{{ $item->product->price }} грн</td>
                                        <td data-title="Сума"> <strong>{{ ($item->product->price * $item->quantity) }} грн</strong> </td>
                                    </tr>
                                @endforeach
                                <tr class="total">
                                    <td>
                                        <h6 class="mb-0">Загальна сумма</h6>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td> <strong>{{ $cartTotal }} грн</strong> </td>
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

</div>
