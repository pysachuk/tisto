<div class="cart_wrapper">
    <li wire:click="refresh" class="cart-dropdown-wrapper cart-trigger">
        <span class="cart-item-count">
            {{ $cartCount }}
        </span>
        <i class="flaticon-shopping-bag"></i>
    </li>
    <!-- Cart Sidebar Start -->
    <div class="cart-sidebar-wrapper">
        <aside class="cart-sidebar">
            <div class="cart-sidebar-header">
                <h3>Ваш кошик</h3>
                <div class="close-btn cart-trigger close-dark">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="cart-sidebar-body">
                <div class="cart-sidebar-scroll">
                    @forelse($cartItems as $item)
                    <div class="cart-sidebar-item">
                        <div class="media">
                            <a href="menu-item-v1.html"><img src="/storage/{{ $item->product->image->image }}" alt="product"></a>
                            <div class="media-body">
                                <h5> <a href="menu-item-v1.html" title="Pepperoni">{{ $item->product->title }}</a> </h5>
                                <span>{{$item->quantity}} x {{ $item->product->price }} грн</span>
                            </div>
                        </div>
{{--                        <div class="cart-sidebar-item-meta">--}}
{{--                            <span>14 Inches</span>--}}
{{--                            <span>Extra Cheese</span>--}}
{{--                            <span>Cheese Crust</span>--}}
{{--                        </div>--}}
                        <div class="cart-sidebar-price">
                            {{ $item->product->price }} грн
                        </div>
                        <div wire:click="removeProduct({{ $item->product }})" class="close-btn">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    @empty
                        <h5>У кошику немає товарів! </h5>
                    @endforelse
                </div>
            </div>
                <div class="cart-sidebar-footer">
                    @if(! $cartItems->isEmpty())
                        <h4>Сума: <span>{{ $cartTotal }} грн</span> </h4>
                        <a href="{{ route('cart.index') }}" class="btn-custom">Змінити</a>
                        <a href="{{ route('order.checkout') }}" class="btn-custom">Оформити замовлення</a>
                    @endif
                </div>
        </aside>
        <div class="cart-sidebar-overlay cart-trigger">
        </div>
    </div>
    <!-- Cart Sidebar End -->
</div>
