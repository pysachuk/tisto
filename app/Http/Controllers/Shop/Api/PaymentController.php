<?php

namespace App\Http\Controllers\Shop\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Services\Payment\Liqpay\LiqPayService;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct()
    {
        $this->paymentService = resolve(PaymentService::class);
    }

//    public function savePayment(Request $request)
//    {
//        if (LiqPayService::verifyRequest($request->signature, $request->data)) {
//            $liqpay_data = LiqPayService::decodeRequestData($request->data);
//            $order_id = $liqpay_data->order_id;
//            $status = $liqpay_data->status;
//            $json = json_encode($liqpay_data);
//            $payment = new Payment;
//            $payment->fill([
//                'order_id' => $order_id,
//                'status' => $status,
//                'json' => $json
//            ]);
//            $payment->save();
//        }
//    }

    public function resultPayment(Request $request)
    {
        $transactionId = $request->order_id;
        if($transactionId) {
            $transaction = Transaction::where('transaction_id', $transactionId)->first();
            if(! $transaction) {
                Log::error("Transaction not found (transaction_id: '$transactionId')");
            } else {
                $this->paymentService->checkPayment($transaction);
            }
        }
        Log::error('No order_id');

        return response('OK');
    }
}
