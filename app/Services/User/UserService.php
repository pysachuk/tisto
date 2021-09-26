<?php
namespace App\Services\User;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function updateUser(User $user, UserUpdateRequest $request)
    {
        $data = [
            'name' => $request -> name,
            'email' => $request -> email
        ];
        if($request -> new_password)
            $data['password'] = Hash::make($request -> new_password);
        return $user -> update($data);
    }

    public function checkUserPassword(User $user, $password)
    {
        if(Hash::check($password, $user->password))
            return true;
        return false;
    }

    public function createUser(StoreUserRequest $request)
    {
        $data = $request -> only((new User)->getFillable());
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
    public function setUserRole($id, $role)
    {
        return User::setRole($id, $role);
    }
}
