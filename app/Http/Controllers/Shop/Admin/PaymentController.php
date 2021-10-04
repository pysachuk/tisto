<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckPayRequest;
use App\Services\Payment\PaymentService;
use Illuminate\View\View;

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function ajaxGetPayment(CheckPayRequest $request): View
    {
        $data['order_id'] = $request->order_id;
        $payment = $this->paymentService->getPayment($request->order_id);
        if ($payment) {
            $data['status'] = $payment->status;
            $data['payment_details'] = json_decode($payment->json);
        } else
            $data['status'] = null;

        return view('shop.admin.order.pay_status', compact('data'));
    }
}
