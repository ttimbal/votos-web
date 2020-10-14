<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsistenciaUpdateRequest extends FormRequest
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
            'persona_id' => 'required|integer|exists:App\Core\Models\Persona,id',
            'estado' => ['required', Rule::in(['P', 'F', 'A'])],
            'fecha' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'persona_id.required' => 'La :attribute es requerida',
            'persona_id.integer' => ':a :attribute no es correcta',
            'persona_id.exists' => 'La :attribute debe esta registrada',
            'estado.required' => 'El :attribute es requerido',
            'estado.in' => 'El :attribute no es valido',
            'fecha.required' => 'La :attribute es requerida',
            'fecha.date_format' => 'La :attribute debe tener el formato año/mes/día'
        ];
    }

    public function attributes()
    {
        return [
            'persona_id' => 'persona',
            'estado' => 'estado',
            'fecha' => 'fecha'
        ];
    }
}
