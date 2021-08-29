<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LiqPay;
use App\Models\Order;
use App\Models\Payment;
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
            'result_url'     => 'https://tisto.pp.ua/cart/pay/status/'.$order -> id

        ));
    }
    public function payPage(Order $order)
    {
        $html = self::getPaymentButton($order);
        return view('shop.order.payment', ['order' => $order, 'button' => $html]);
    }

    public function payStatus($order_id)
    {
//        $payment = Payment::where('order_id', $order_id) -> first();
        $order = Order::find($order_id);
        $payment = $order -> payment;
        $data['order_id'] = $order_id;
        if(!$payment)
        {
            $data['status'] = 'pay_cancelled';
            $data['error'] = 'Оплату скасовано!';
//            $data['payment_button'] = self::getPaymentButton($order);
            return view('shop.order.order_status', compact('data'));
        }
        if($payment -> status == 'success')
        {
            $data['status'] = $payment -> status;
            return view('shop.order.order_status', compact('data'));
        }
        else
        {
            $payment = json_decode($payment -> json);
            $data['status'] = $payment -> status;
            $data['error'] = $payment -> err_description;
            return view('shop.order.order_status', compact('data'));
        }
    }
    public function checkPay(Request $request)
    {
        $payment = Payment::where('order_id', $request -> order_id) -> first();
        return response() -> json($payment);
    }
}
