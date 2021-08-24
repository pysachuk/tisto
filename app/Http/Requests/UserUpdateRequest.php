<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'old_password' => 'required|string',
            'new_password' => 'nullable|string|confirmed',
            'new_password_confirmation' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Введіть імя!',
            'email.required' => 'Введіть Email!',
            'old_password.required' => 'Введіть поточний пароль!',
            'new_password.confirmed' => 'Паролі не співпадають!',
        ];
    }
}
