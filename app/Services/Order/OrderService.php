<?php
namespace App\Services\Order;

use App\Models\Order;

class OrderService
{
    public function getOrderStatusByUrl($status)
    {
        switch ($status)
        {
            case 'new':
            {
                $status = Order::STATUS_NEW;
                break;
            }
            case 'approved':
            {
                $status = Order::STATUS_APPROVED;
                break;
            }
            case 'rejected':
            {
                $status = Order::STATUS_REJECTED;
                break;
            }
        }
        return $status;
    }
}
