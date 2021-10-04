<?php

namespace App\Services\Payment;

use App\Models\Payment;

class PaymentService
{
    public function getPayment($order_id)
    {
        return Payment::getPayment($order_id);
    }

}
