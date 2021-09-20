<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this -> orderRepository = $orderRepository;
    }

    public function index()
    {
        $data['new_orders_count'] = $this -> orderRepository -> getNewOrdersCount();
        $data['current_month_orders_count'] = $this -> orderRepository -> getCurrentMonthAcceptedOrdersCount();
        $data['current_month_summ'] = $this -> orderRepository -> getCurrentMonthSumm();
        $data['total_amount'] = $this -> orderRepository -> getTotalAmount();
        return view('shop.admin.main.main', compact('data'));
    }

}
