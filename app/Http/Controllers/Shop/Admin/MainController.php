<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $orders_count = Order::where('status', 1)->count();
        return view('shop.admin.main.main', compact('orders_count'));
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
