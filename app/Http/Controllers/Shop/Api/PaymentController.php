<?php

namespace App\Http\Controllers\Shop\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\Payment\Liqpay\LiqPayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function savePayment(Request $request)
    {
        if (LiqPayService::verifyRequest($request->signature, $request->data)) {
            $liqpay_data = LiqPayService::decodeRequestData($request->data);
            $order_id = $liqpay_data->order_id;
            $status = $liqpay_data->status;
            $json = json_encode($liqpay_data);
            $payment = new Payment;
            $payment->fill([
                'order_id' => $order_id,
                'status' => $status,
                'json' => $json
            ]);
            $payment->save();
        }
    }
}
