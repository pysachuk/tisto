<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function user()
    {
        $user = User::findOrFail(Auth::id());

        return view('shop.admin.user.index', compact('user'));
    }

    public function userUpdate(UserUpdateRequest $request)
    {
        $user = Auth::user();
        if (!$this->userService->checkUserPassword($user, $request->old_password))
            return redirect()->back()
                ->with('message', ['type' => 'error', 'message' => __('messages.invalid_old_password')]);
        if ($this->userService->updateUser($user, $request))
            return redirect()->back()
                ->with('message', ['type' => 'success', 'message' => __('messages.data_change_success')]);
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
        $user = $this->userService->createUser($request);
        $this->userService->setUserRole($user->id, $request->role);

        return redirect()->route('admin.users')
            ->with('message', ['type' => 'success', 'message' => __('messages.user_created')]);

    }

    public function deleteUser(User $user)
    {
        if ($user->delete())
            return redirect()->back()
                ->with('message', ['type' => 'info', 'message' => __('messages.user_deleted')]);
    }

}
