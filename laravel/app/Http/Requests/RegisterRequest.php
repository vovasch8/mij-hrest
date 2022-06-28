<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле ім\'я є обов\'язковим',
            'name.max' => 'Ім\'я має бути меньше 255 символів',
            'email.required' => 'Поле email є обов\'язковим',
            'email.email' => 'Поле email має відповідати правилам вводу email',
            'email.max' => 'Поле email має бути меньше 255 символів',
            'email.unique' => 'Користувач з даним email вже зареєстрований',
            'password.required' => 'Поле пароль має бути обов\'язковим',
            'password.confirmed' => 'Паролі повинні співпадати',
        ];
    }
}
