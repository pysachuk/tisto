<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkPay(Request $request)
    {
        $data['order_id'] = $request -> order_id;
        $payment = Payment::checkPay($request -> order_id);
        if(!empty($payment))
        {
            $data['status'] = $payment -> status;
            $data['payment_details'] = json_decode($payment -> json);
        }
        else
            $data['status'] = null;

        return view('shop.admin.order.pay_status', compact('data'));
    }
}
