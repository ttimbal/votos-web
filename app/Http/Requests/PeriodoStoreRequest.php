<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodoStoreRequest extends FormRequest
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
            'nombre' => 'required|string|between:4,20',
            'fecha_inicio' => 'required|date_format:Y-m-d',
            'fecha_fin' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }

    public function attributes()
    {
        return parent::attributes(); // TODO: Change the autogenerated stub
    }
}