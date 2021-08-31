<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this -> orderRepository = $orderRepository;
    }

    public function index()
    {
        $data['new_orders_count'] = $this -> orderRepository -> getOrdersByStatus(1) -> count();
        $data['current_month_orders_count'] = $this -> orderRepository -> getCurrentMonthAcceptedOrders() -> count();
        $data['current_month_summ'] = $this -> orderRepository -> getCurrentMonthSumm();
        $data['total_amount'] = $this -> orderRepository -> getTotalAmount();
        return view('shop.admin.main.main', compact('data'));
    }

    public function user()
    {
        $user = User::where('id', Auth::id()) -> first();
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
        return redirect() -> back() -> with('success', 'Дані успішно змінено!');

    }
}
