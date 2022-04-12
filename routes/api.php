<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\Api\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::post('/payment_status', [\App\Http\Controllers\Shop\Api\PaymentController::class, 'savePayment']);
Route::post('/payment/result', [PaymentController::class, 'resultPayment'])
    ->name('payment.result');
