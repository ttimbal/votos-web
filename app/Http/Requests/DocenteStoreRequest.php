<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteStoreRequest extends FormRequest implements EspecialidadRulesInterface
{
    use PersonaRulesTrait, TelefonoRulesTrait;

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
        return array_merge(
            $this->personaStoreRules(),
            $this->telefonoStoreRules(),
            self::ESPECIALIDAD_RULES, [
                'inicio' => 'required|date_format:Y-m-d'
            ]
        );
    }

    public function messages()
    {
        return array_merge(
            $this->personaMessages,
            $this->telefonoMessages,
            self::ESPECIALIDAD_MESSAGES,[
                'inicio.required' => 'La :attribute es requerida',
                'inicio.date_format' => 'La :attribute debe tener el formato año/mes/día'
            ]
        );
    }

    public function attributes()
    {
        return array_merge(
            $this->personaAttibutes,
            $this->telefonoAttributes,
            self::ESPECIALIDAD_ATTRIBUTES,
            ['inicio' => 'fecha de inicio']
        );
    }
}
