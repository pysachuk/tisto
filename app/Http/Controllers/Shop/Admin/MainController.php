<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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

    public function user()
    {
        $user = User::where('id', Auth::id()) -> first();
//        dd($user);
        return view('shop.admin.user.index', compact('user'));
    }
    public function userUpdate(UserUpdateRequest $request)
    {
        $user = User::where('id', Auth::id()) -> first();
        if(!Hash::check($request -> old_password, $user->password))
            return redirect() -> back() -> with('error', 'Не вірний поточний пароль!');
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        if($request -> new_password && $request -> new_password == $request -> new_password_confirmation)
            $user -> password = Hash::make($request -> new_password);
        $user -> save();
        return redirect() -> back() -> with('message', 'Дані успішно змінено!');

    }
}
