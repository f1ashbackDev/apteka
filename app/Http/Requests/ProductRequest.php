<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:products',
            'count' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле не должно быть пустым',
            'name.unique' => 'Такой продукт уже существует',
            'count.required' => 'Укажите количество товара на складе',
            'price.required' => 'Укажите цену товара',
            'description.required' => 'Добавьте описание продукта',
            'category_id.required' => 'Укажите категорию товара'
        ];
    }
}
