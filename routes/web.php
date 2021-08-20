<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Shop\MainController::class, 'index']) -> name('shop.main');

Route::get('/test',[\App\Http\Controllers\Test\TestController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CART
Route::middleware('web') ->group(function(){
    Route::get('/cart', [App\Http\Controllers\Shop\CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart', [App\Http\Controllers\Shop\CartController::class, 'addToCart'])
        ->name('addToCart');
    Route::post('/cart/remove_item', [App\Http\Controllers\Shop\CartController::class, 'removeItem'])
        ->name('cart.remove_item');
    Route::post('/cart/add_count', [App\Http\Controllers\Shop\CartController::class, 'addCount'])
        ->name('cart.add_count');
    Route::post('/cart/minus_count', [App\Http\Controllers\Shop\CartController::class, 'minusCount'])
        ->name('cart.minus_count');
});
//ORDER
Route::get('cart/checkout', [App\Http\Controllers\Shop\OrderController::class, 'checkout'])
    -> name('cart.checkout');
Route::post('cart/checkout/add', [App\Http\Controllers\Shop\OrderController::class, 'addOrder'])
    -> name('cart.add_order');


//ADMIN
Route::middleware('admin')->prefix('admin') ->group(function(){
    Route::get('/', [\App\Http\Controllers\Shop\Admin\MainController::class, 'index'])
        -> name('admin.home');
    Route::resource('/category', \App\Http\Controllers\Shop\Admin\CategoryController::class)
    ->names('admin.category');
    Route::resource('/product', \App\Http\Controllers\Shop\Admin\ProductController::class)
        ->names('admin.product');
    Route::resource('/order', \App\Http\Controllers\Shop\Admin\OrderController::class)
        ->names('admin.order');
});
