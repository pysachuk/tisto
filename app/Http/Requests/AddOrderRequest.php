<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOrderRequest extends FormRequest
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
            'phone' => 'required|regex:#^\+38\([0-9][0-9][0-9]\) [0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]#',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'payment_method'    => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Вкажіть своє ім'я!",
            'phone' => 'Телефон вказано не вірно!',
            'address.required' => "Вкажіть свою адресу!",
        ];
    }
}
