<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Payment\Liqpay\LiqPayService;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payed()
    {

    }

    public function payPage(Order $order)
    {
        $button = LiqPayService::getPaymentButton($order);

        return view('shop.order.payment', ['order' => $order, 'button' => $button]);
    }

    public function payStatus($order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('shop.order.order_status', compact('order'));
    }

    public function checkPay(Request $request)
    {
        $payment = Payment::checkPay($request->order_id);
        if ($payment)
            return response()->json($payment);
    }
}
