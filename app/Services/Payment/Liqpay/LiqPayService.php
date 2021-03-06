<?php

namespace App\Services\Payment\Liqpay;

use App\Services\Payment\Liqpay\LiqPay;
use App\Models\Order;
use Illuminate\Support\Facades\Config;

class LiqPayService
{
    public static function getPaymentButton(Order $order)
    {
        $liqpay = new LiqPay(Config::get('liqpay.public_key'), Config::get('liqpay.private_key'));

        return $liqpay->cnb_form(array(
            'action' => 'pay',
            'amount' => $order->summ,
            'currency' => Config::get('liqpay.currency'),
            'description' => 'Оплата замовлення № ' . $order->id,
            'order_id' => $order->id,
            'version' => '3',
            'language' => Config::get('liqpay.language'),
            'server_url' => 'https://tisto.pp.ua/api/payment_status',
            'result_url' => 'https://tisto.pp.ua/cart/pay/status/' . $order->id

        ));
    }

    public static function verifyRequest($signature, $data)
    {
        $private_key = Config::get('liqpay.private_key');
        $verify = base64_encode(sha1(
            $private_key .
            $data .
            $private_key
            , 1));
        if ($signature == $verify)
            return true;
        else
            return false;
    }

    public static function decodeRequestData($data)
    {
        $json = base64_decode($data);

        return json_decode($json);
    }

}
