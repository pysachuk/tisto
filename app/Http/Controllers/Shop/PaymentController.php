<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LiqPay;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    protected static $public_key;
    protected static $private_key;

    public static function getPaymentButton(Order $order)
    {
        self::$public_key = Config::get('liqpay.public_key');
        self::$private_key = Config::get('liqpay.private_key');
        $liqpay = new LiqPay(self::$public_key, self::$private_key);
        return $liqpay->cnb_form(array(
            'action'         => 'pay',
            'amount'         => $order -> summ,
            'currency'       => Config::get('liqpay.currency'),
            'description'    => 'Оплата замовлення № '.$order -> id,
            'order_id'       => $order -> id,
            'version'        => '3',
            'language'       => Config::get('liqpay.language'),
            'server_url'     => 'https://tisto.pp.ua/api/payment_status',
            'result_url'     => Config::get('app.url')

        ));
    }
}
