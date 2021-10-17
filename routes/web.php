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


//MAIN
Route::get('/', \App\Http\Livewire\Menu::class) -> name('shop.main');
Route::get('/info', [\App\Http\Controllers\Shop\MainController::class, 'info']) -> name('shop.info');

//CART
Route::middleware('web') ->group(function(){
    Route::get('/cart', \App\Http\Livewire\Cart::class)->name('cart.index');
//    Route::post('/add-to-cart', [App\Http\Controllers\Shop\CartController::class, 'addToCart'])
//        ->name('addToCart');
//    Route::post('/cart/remove_item', [App\Http\Controllers\Shop\CartController::class, 'removeItem'])
//        ->name('cart.remove_item');
//    Route::post('/cart/edit_count', [App\Http\Controllers\Shop\CartController::class, 'editCount'])
//        ->name('cart.edit_count');
});
//ORDER
Route::get('/order/checkout', \App\Http\Livewire\Order::class)->name('order.checkout');
Route::get('cart/checkout', [App\Http\Controllers\Shop\OrderController::class, 'checkout'])
    -> name('cart.checkout');
Route::post('cart/checkout/accepted', [App\Http\Controllers\Shop\OrderController::class, 'addOrder'])
    -> name('cart.add_order');
Route::get('/cart/pay/{order}', [App\Http\Controllers\Shop\PaymentController::class, 'payPage'])
-> name('cart.pay_page');
Route::get('/cart/pay/status/{order_id}', [App\Http\Controllers\Shop\PaymentController::class, 'payStatus'])
    -> name('cart.pay_status');




//ADMIN AUTH
Route::get('/panel/login',[\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])
    -> name('admin.login');
Route::post('/panel/login',[\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/panel/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])
    -> name('admin.logout');
//ADMIN
Route::middleware('admin')->prefix('panel') ->group(function(){
    //HOME
    Route::get('/', [\App\Http\Controllers\Shop\Admin\MainController::class, 'index'])
        -> name('admin.home');

    //ORDERS
    Route::get('/orders/{status}', [\App\Http\Controllers\Shop\Admin\OrderController::class, 'getOrders'])
        ->name('admin.orders');
    Route::get('/order/view/{order}', [\App\Http\Controllers\Shop\Admin\OrderController::class, 'viewOrder'])
        ->name('admin.order.view');
    Route::post('/order/approve', [\App\Http\Controllers\Shop\Admin\OrderController::class, 'approveOrder'])
        ->name('admin.order.approve');
    Route::post('/order/reject', [\App\Http\Controllers\Shop\Admin\OrderController::class, 'rejectOrder'])
        ->name('admin.order.reject');
    Route::post('/order/pay_status', [\App\Http\Controllers\Shop\Admin\PaymentController::class, 'ajaxGetPayment'])
        ->name('admin.order.payStatus');

    //USER
    Route::get('/user', [\App\Http\Controllers\Shop\Admin\UserController::class, 'user'])
        ->name('admin.user');
    Route::post('/user', [\App\Http\Controllers\Shop\Admin\UserController::class, 'userUpdate'])
        ->name('admin.user.update');

    Route::middleware('can:view-admin-part') -> group(function (){
        //CATEGORIES
        Route::resource('/category', \App\Http\Controllers\Shop\Admin\CategoryController::class)
            ->names('admin.category');

        //PRODUCTS
        Route::resource('/product', \App\Http\Controllers\Shop\Admin\ProductController::class)
            ->names('admin.product');
        Route::post('/category_products', [\App\Http\Controllers\Shop\Admin\ProductController::class, 'getCategoryProducts'])
            ->name('admin.category_products');

        //USERS
        Route::get('/users', [\App\Http\Controllers\Shop\Admin\UserController::class, 'users'])
            ->name('admin.users');
        Route::get('/users/create', [\App\Http\Controllers\Shop\Admin\UserController::class, 'createUser'])
            ->name('admin.users.create');
        Route::post('/users/store', [\App\Http\Controllers\Shop\Admin\UserController::class, 'storeUser'])
            ->name('admin.users.store');
        Route::delete('/users/delete/{user}', [\App\Http\Controllers\Shop\Admin\UserController::class, 'deleteUser'])
            ->name('admin.users.delete');


        //PAGES
        Route::post('/pages/get', [\App\Http\Controllers\Shop\Admin\PagesController::class, 'getPage'])
            -> name('admin.pages.getPage');
        Route::get('/pages/main/edit', [\App\Http\Controllers\Shop\Admin\PagesController::class, 'mainEdit'])
            ->name('admin.pages.main.edit');
        Route::post('/pages/main/update', [\App\Http\Controllers\Shop\Admin\PagesController::class, 'mainUpdate'])
            -> name('admin.pages.main.update');
        Route::get('/pages/info/edit', [\App\Http\Controllers\Shop\Admin\PagesController::class, 'infoEdit'])
            ->name('admin.pages.info.edit');
        Route::post('/pages/info/update', [\App\Http\Controllers\Shop\Admin\PagesController::class, 'infoUpdate'])
            -> name('admin.pages.info.update');

    });

});
