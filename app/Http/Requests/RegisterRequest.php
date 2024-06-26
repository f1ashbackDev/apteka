<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:32',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Укажите имя',
            'surname.required' => 'Укажите фамилию',
            'login.required' => 'Укажите логин пользователя',
            'login.unique' => 'Данный логин уже занят',
            'email.required' => 'Укажите почту',
            'email.unique' => 'Данная почта уже занята',
            'password.required' => 'Укажите пароль',
            'password.min' => 'Пароль не может быть меньше 6 символов',
            'password.max' => 'Пароль не можеть быть больше 32 символов',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}
