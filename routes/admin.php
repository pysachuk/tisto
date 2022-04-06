<?php

namespace App\Services;

use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\Product\Edit;
use App\Http\Livewire\Admin\ViewOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Product\Products;
use App\Http\Livewire\Admin\Product\Create;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Shop\Admin\MainController;
use App\Http\Controllers\Shop\Admin\OrderController;
use App\Http\Controllers\Shop\Admin\PaymentController;
use App\Http\Controllers\Shop\Admin\UserController;
use App\Http\Controllers\Shop\Admin\CategoryController;
use App\Http\Controllers\Shop\Admin\PagesController;
use App\Http\Controllers\Shop\Admin\ProductController;

//ADMIN AUTH
Route::get('/panel/login',[LoginController::class, 'showLoginForm'])
   ->name('admin.login');
Route::post('/panel/login',[LoginController::class, 'login']);
Route::post('/panel/logout', [LoginController::class, 'logout'])
   ->name('admin.logout');
//ADMIN
Route::middleware('admin')->prefix('panel') ->group(function() {
    //HOME
    Route::get('/', [MainController::class, 'index'])
        ->name('admin.home');

    //ORDERS
    Route::get('/orders/{status}', Orders::class)
        ->name('admin.orders');
    Route::get('/order/view/{order}', ViewOrder::class)
        ->name('admin.order.view');
    Route::post('/order/approve', [OrderController::class, 'approveOrder'])
        ->name('admin.order.approve');
    Route::post('/order/reject', [OrderController::class, 'rejectOrder'])
        ->name('admin.order.reject');
    Route::post('/order/pay_status', [PaymentController::class, 'ajaxGetPayment'])
        ->name('admin.order.payStatus');

    //USER
    Route::get('/user', [UserController::class, 'user'])
        ->name('admin.user');
    Route::post('/user', [UserController::class, 'userUpdate'])
        ->name('admin.user.update');

    Route::middleware('can:view-admin-part')->group(function () {
        //CATEGORIES
        Route::resource('/category', CategoryController::class)
            ->names('admin.category');

        //PRODUCTS
        Route::get('/products', Products::class)->name('admin.products');
        Route::get('/products/create', Create::class)->name('admin.products.create');
        Route::get('products/{product}/edit', Edit::class)->name('admin.products.edit');

//
//        Route::post('/category_products', [ProductController::class, 'getCategoryProducts'])
//            ->name('admin.category_products');

        //USERS
        Route::get('/users', [UserController::class, 'users'])
            ->name('admin.users');
        Route::get('/users/create', [UserController::class, 'createUser'])
            ->name('admin.users.create');
        Route::post('/users/store', [UserController::class, 'storeUser'])
            ->name('admin.users.store');
        Route::delete('/users/delete/{user}', [UserController::class, 'deleteUser'])
            ->name('admin.users.delete');


        //PAGES
        Route::post('/pages/get', [PagesController::class, 'getPage'])
            ->name('admin.pages.getPage');
        Route::get('/pages/main/edit', [PagesController::class, 'mainEdit'])
            ->name('admin.pages.main.edit');
        Route::post('/pages/main/update', [PagesController::class, 'mainUpdate'])
            ->name('admin.pages.main.update');
        Route::get('/pages/info/edit', [PagesController::class, 'infoEdit'])
            ->name('admin.pages.info.edit');
        Route::post('/pages/info/update', [PagesController::class, 'infoUpdate'])
            ->name('admin.pages.info.update');
    });
});
