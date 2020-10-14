<?php

namespace App\Http\Requests;

use App\Core\Repositories\CargoAdministrativoTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdministrativoUpdateRequest extends FormRequest
{
    use PersonaRulesTrait, TelefonoRulesTrait,CargoAdministrativoTrait;

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
            ['cargo' => ['required', Rule::in($this->getCargos())],
                'inicio' => 'required|date_format:Y-m-d']
        );
    }

    public function messages()
    {
        return array_merge(
            $this->personaMessages,
            $this->telefonoMessages,
            ['cargo.required' => 'El :attribute es requerido',
                'cargo.in' => 'El :attribute no esta registrado',
                'inicio.required' => 'La :attribute es requerida',
                'inicio.date_format' => 'La :attribute debe tener el formato año/mes/día']
        );
    }

    public function attributes()
    {
        return array_merge(
          $this->personaAttibutes,
          $this->telefonoAttributes,
          ['cargo' => 'cargo',
              'inicio' => 'fecha inicio']
        );
    }
}
