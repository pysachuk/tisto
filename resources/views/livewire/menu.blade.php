<div>
        <!-- Menu Wrapper Start -->
        <div class="section section-padding menu-v2">
            <div class="container">
            @foreach($categories as $category)
                <!-- Category Start -->
                    <div class="menu-category dark-overlay dark-overlay-2" style="background-image: url('/storage/{{ $category -> image_url }}')">
                        <h3>{{ $category -> title }}</h3>
                        <p>{{ $category -> description }}</p>
                    </div>
                    <div class="row">
                    @foreach($category -> products as $product)
                        <!-- Product Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="product">
                                    <div class="favorite">
                                        <i class="far fa-heart"></i>
                                    </div>
                                    <div class="product-thumb" href="menu-item-v1.html"> <img style="max-width: 220px" src="/storage/{{ $product -> image -> image ?? null }}" alt="menu item" /> </div>
                                    <div class="product-body">
                                        <div class="product-desc">
                                            <h4 class="product_title" data-id="{{ $product -> id }}">{{ $product -> title }}</h4>
                                            <p>{{ $product -> description }}</p>
                                            <p class="product-price"><i class="fas fa-weight" style="color: silver;"></i> {{ $product -> weight }}г</p>
                                        </div>
                                        <div class="product-controls">
                                            <p class="product-price">{{ $product -> price }} грн</p>
                                            @if( $product->available )
                                                <span wire:click="add({{ $product }})" href="#" class="order-item btn-custom btn-sm shadow-none add_to_cart" data-id="{{ $product -> id }}">
                                                    Додати <i class="fas fa-shopping-cart"></i>
                                                </span>
                                            @else
                                                <span class="">
                                                    <i class="text-danger">Немає</i>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product End -->
                        @endforeach
                    </div>
                    <!-- Category End -->
                @endforeach

            </div>
        </div>
        <!-- Menu Wrapper End -->
</div>
