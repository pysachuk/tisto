<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        $data['new_orders_count'] = Order::where('status', 1)->count();
        $data['current_month_orders_count'] = count(Order::getCurrentMonthOrders());
        $data['current_month_summ'] = Order::getCurrentMonthSumm();
        $data['total_amount'] = Order::getTotalAmount();
        return view('shop.admin.main.main', compact('data'));
    }

    public function adminList()
    {
        $users = User::all();
        foreach ($users as $user )
        {
            $admins[] = ($user -> role -> role == 'admin') ? $user : '' ;
        }
        return view('shop.admin.admins.index', compact('admins'));
    }
}
