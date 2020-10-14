<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteUpdateRequest extends FormRequest implements EspecialidadRulesInterface
{
    use PersonaRulesTrait, TelefonoRulesTrait;

    /**
     * esta variable contendra el id de la persona que se esta actualizando
     * @var $id
     */
    protected $id;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $atributosUrl = explode('/',$this->fullUrl());
        $this->id = $atributosUrl[sizeof($atributosUrl) - 1];
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
          $this->personaUpdateRules($this->id),
          $this->telefonoUpdateRules($this->id),
          self::ESPECIALIDAD_RULES,
          ['inicio' => 'required|date_format:Y-m-d']
        );
    }

    public function messages()
    {
        return array_merge(
            $this->personaMessages,
            $this->telefonoMessages,
            self::ESPECIALIDAD_MESSAGES,
            ['inicio.required' => 'La :attribute es requerida',
                'inicio.date_format' => 'La :attribute debe tener el formato año/mes/día']
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
