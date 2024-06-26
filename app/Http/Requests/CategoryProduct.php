<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryProduct extends FormRequest
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
            'categories_name' => 'required|unique:category',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле не должно быть пустым',
            'name.unique' => 'Такой каталог уже существует',
            'image.required' => 'Добавьте фотографии',
        ];
    }
}
