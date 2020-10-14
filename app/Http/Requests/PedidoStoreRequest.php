<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoStoreRequest extends FormRequest
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
            'proveedor' => 'required|integer|exists:App\Core\Models\Proveedor,persona_id',
            'nombreInstrumentos_id' => 'required|array|min:1',
            'nombreInstrumentos_id.*' => 'required|integer|exists:App\Core\Models\NombreInstrumento,id',
            'cantidades' => 'required|array|min:1',
            'cantidades.*' => 'required|integer|between:1,100'
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
