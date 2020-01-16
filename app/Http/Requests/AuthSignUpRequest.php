<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthSignUpRequest extends FormRequest
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
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es requerido',
            'lastname.required' => 'El :attribute es requerido',
            'email.required' => 'El :attribute es requerido',
            'email.email' => 'Debes ingresar un :attribute válido',
            'email.unique' => 'Este :attribute ya está en uso',
            'password.required' => 'Debes escribir una :attribute',
            'password.min' => 'La :attribute debe tener al menos 8 caracteres',
            'password.confirmed' => 'Debes confirmar la :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'lastname' => 'apellido',
            'email' => 'correo electrónico',
            'password' => 'contraseña'
        ];
    }
}