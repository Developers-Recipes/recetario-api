<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El :attribute es requerido',
            'email.email' => 'El :attribute no es válido',
            'email.exists' => 'No existe una cuenta con este :attribute',
            'password.require' => 'La :attribute es requerida'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'correo electrónico',
            'password' => 'contraseña'
        ];
    }
}