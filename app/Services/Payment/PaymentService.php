<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
use App\Services\Payment\Fondy\FondyService;
use Illuminate\Support\Str;

class PaymentService
{
    protected $fondyService;

    public function __construct()
    {
        $this->fondyService = resolve(FondyService::class);
    }

    public function orderPayment(Order $order)
    {
        $transaction = $order->transactions()->create([
            'transaction_id' => Str::uuid()->toString().Str::random(4)
        ]);

        return $this->fondyService->redirectForPayment($transaction);
    }

    public function checkPayment(Transaction $transaction)
    {
        $status = $this->fondyService->getPaymentStatus($transaction);
        if($status->order_status === 'approved' && $status->actual_amount == $transaction->order->summ * 100) {
            $transaction->update([
                'payed' => true,
                'status' => $status->order_status,
                'response_description' => $status->response_description,
                'payload' => $status->response_signature_string
            ]);
            return true;
        }

        $transaction->update([
            'status' => $status->order_status,
            'response_description' => $status->response_description,
            'payload' => $status->response_signature_string
        ]);

        return false;
    }

    public function getPayment($order_id)
    {
        return Payment::getPayment($order_id);
    }

}
