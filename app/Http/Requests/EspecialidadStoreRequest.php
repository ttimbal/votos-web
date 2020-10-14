<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadStoreRequest extends FormRequest
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
            'nombre' => 'required|string|between:3,30'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El :attribute es requerido',
            'nombre.string' => 'El :attribute debe ser un texto',
            'nombre.between' => 'El :attribute debe tener de :min a :max caracteres',
        ];
    }
}
