<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

    public function users()
    {
        $users = User::all();
        return view('shop.admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('shop.admin.users.create');
    }

    public function storeUser(StoreUserRequest $request)
    {
        $user = new User;
        $data = $request->only($user->getFillable());
        $user->fill($data);
        $user -> password = Hash::make($request -> password);
        if($user -> save())
        {
            $role = new UserRole;
            $role -> user_id = $user -> id;
            $role -> role = $request -> role;
            $role -> save();
        }
            return redirect() -> route('admin.users') -> with('success', 'Користувач успішно створено');
    }

    public function deleteUser(User $user)
    {
        if($user -> delete())
            return redirect() -> back() -> with('success', 'Користувача видалено');
    }

}
