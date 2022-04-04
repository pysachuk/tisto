<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Menu;
use App\Http\Controllers\Shop\MainController;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Order;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\Shop\PaymentController;

//MAIN
//Route::get('/', [\App\Http\Controllers\Shop\MainController::class, 'index'])->name('shop.main');
Route::get('/', Menu::class) -> name('shop.main');
Route::get('/info', [MainController::class, 'info']) -> name('shop.info');

//CART
Route::get('/cart', Cart::class)->name('cart.index');

//ORDER
Route::get('/order/checkout', Order::class)
    ->middleware('isWorkTime', 'isCart')
    ->name('order.checkout');
Route::get('/order/accepted/{order}', [OrderController::class, 'orderAccepted'])
    ->name('order.accepted');

//PAYMENT
Route::get('/cart/pay/{order}', [PaymentController::class, 'payPage'])
-> name('cart.pay_page');
Route::get('/cart/pay/status/{order_id}', [PaymentController::class, 'payStatus'])
    -> name('cart.pay_status');
