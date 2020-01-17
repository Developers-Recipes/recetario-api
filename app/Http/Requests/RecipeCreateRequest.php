<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeCreateRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
            //validacion de steps
            'steps.*.recipe_id' => 'required|numeric',
            'steps.*.number_step' => 'required|numeric',
            'steps.*.name' => 'required',
            'steps.*.description' => 'required',
            'steps.*.link' => 'required|regex:^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$^'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El :attribute es requerido',
            'user_id.numeric' => 'El :attribute debe ser un numero',
            'state_id.required' => 'El :attribute es requerido',
            'state_id.numeric' => 'El :attribute debe ser un numero',
            'name.required' => 'El :attribute es requerido',
            'description.required' => 'El :attribute es requerido',
            //messages step
            'steps.*.recipe_id.required' => 'El :attribute es requerido',
            'steps.*.recipe_id.numeric' => 'El :attribute debe ser un numero',
            'steps.*.number_step.required' => 'El :attribute es requerido',
            'steps.*.number_step.numeric' => 'El :attribute debe ser un numero',
            'steps.*.name.required' => 'El :attribute es requerido',
            'steps.*.description.required' => 'El :attribute es requerido',
            'steps.*.link.regex' => 'El :attribute no es valido' 
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'usuario',
            'state_id' => 'Estado de receta',
            'name' => 'nombre de receta',
            'description' => 'Descripcion de la receta',
            //attributes step
            'steps.*.recipe_id' => 'Receta',
            'steps.*.number_step' => 'posicion de reseta',
            'steps.*.name' => 'Nombre de step',
            'steps.*.description' => 'Descrion de step',
            'steps.*.link' => 'Link de step'
        ];
    }
}
