<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login'=>'required',
            'password'=>'required|min:6|max:32',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Укажите имя',
            'password.required' => 'Укажите пароль',
            'password.min' => 'Пароль не может быть меньше 6 символов',
            'password.max' => 'Пароль не можеть быть больше 32 символов',
        ];
    }
}
