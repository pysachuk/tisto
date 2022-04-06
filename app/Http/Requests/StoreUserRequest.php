<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $checkLocation = $this->role == 'manager' ? true : false;

        if($this->location == 'null') {
            $this->location = null;
        }
        $locationRules = $checkLocation ? ['exists:locations,key'] : ['nullable'];


        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'role'     => 'required|string',
            'location' => $locationRules
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введіть імя!',
            'email.required' => 'Введіть Email!',
            'location.required' => 'Виберіть локацію!',
            'location.exists' => 'Виберіть локацію!',
            'password.required' => 'Введіть пароль!',
            'password.confirmed' => 'Паролі не співпадають!',
        ];
    }
}
