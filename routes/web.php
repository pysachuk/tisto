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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMIN
Route::middleware('admin')->prefix('admin') ->group(function(){
    Route::get('/', [\App\Http\Controllers\Shop\Admin\MainController::class, 'index'])
        -> name('admin.home');
    Route::resource('/category', \App\Http\Controllers\Shop\Admin\CategoryController::class)
    ->names('admin.category');
    Route::resource('/product', \App\Http\Controllers\Shop\Admin\ProductController::class)
        ->names('admin.product');
});
