<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/payment_status', function (Request $request){
    // DB::table('payments') -> insert([
    //     'order_id' => 4,
    //     'status' => 'test',
    //     'json' => json_encode($request->signature)
    // ]);
    // return response() -> json('123');
    $private_key = Config::get('liqpay.private_key');
    $signature = $request -> signature;
    $data = $request -> data;

    $verify = base64_encode( sha1(
        $private_key .
        $data .
        $private_key
        , 1 ));
    if( $signature == $verify)
    {
        $liqpay_data = json_decode(base64_decode($data));
        $order_id = $liqpay_data -> order_id;
        $status = $liqpay_data -> status;
        $json = base64_decode($data);
        $result = DB::table('payments') -> insert([
            'order_id' => $order_id,
            'status' => $status,
            'json' => $json
        ]);
        if($result)
            return response() -> json('Success');
    }
    else
        return response() -> json('Verify failed');
});
