<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->numbers()->symbols()
            ],
        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es obligatorio. ',
            'email.required' => 'El email es obligatorio. ',
            'email.email' => 'El formato del email no es válido. ',
            'email.unique' => 'El email ya está registrado',
            'password' => 'El password debe contener 8 caracteres, con al menos un numero y un simbolo. ',
            'password.required' => 'El password es obligatorio. ',
            'password.confirmed' => 'Los passwords no coinciden. ',
        ];
    }
}
