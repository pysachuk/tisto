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
            'phone' => 'required|min:10|numeric',
            'address' => 'required|string',
            'description' => 'string',
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
