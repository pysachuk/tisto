<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'photo' => 'required|image',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Укажите категорию!',
            'title.required' => 'Укажите название',
            'title.string' => 'Название должно быть строкой',
            'description.required' => 'Описание не должно быть пустым',
            'description.string' => 'Описание должно быть строкой',
            'price.required' => 'Укажите цену',
            'price.numeric' => 'Цена должна быть числом',
            'weight.required' => 'Укажите вес',
            'weight.numeric' => 'Вес должен быть числом',
            'photo.required' => 'Загрузите фото!',
            'photo.image' => 'Формат фото должен быть (jpg, jpeg, png, bmp, gif, svg или webp)'
        ];
    }
}
