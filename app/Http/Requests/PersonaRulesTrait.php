<?php


namespace App\Http\Requests;


use App\Rules\NuevoCiNit;
use App\Rules\NuevoCorreo;

trait PersonaRulesTrait
{
    protected $personaRules = [
        'nombre' => 'required|string|between:3,50',
        'direccion' => 'required|string|between:4,100',
        'correo' => ['required', 'email', 'between:5,80'],
        'ci_nit' => ['required', 'integer', 'digits_between:6,11']
    ];

    protected $personaAttibutes = [
        'nombre' => 'nombre',
        'direccion' => 'dirección',
        'correo' => 'correo',
        'ci_nit' => 'carnet de identidad'
    ];

    protected $personaMessages = [
        'nombre.required' => 'El :attribute es requerido',
        'nombre.string' => 'El :attribute debe contener solo caracteres alfabéticos',
        'nombre.between' => 'El :attribute debe tener de :min a :max caracteres',
        'direccion.required' => 'La :attribute es requerida',
        'direccion.string' => 'La :attribute debe ser una cadena de texto',
        'direccion.between' => 'La :attribute debe tener de :min a :max caracteres',
        'correo.required' => 'el :attribute es requerido',
        'correo.email' => 'El :attribute debe ser valido',
        'correo.between' => 'El :attribute debe tener de :min a :max caracteres',
        'correo.unique' => 'El :attribute ya se encuentra registrado',
        'ci_nit.required' => 'El :attribute es requerido',
        'ci_nit.integer' => 'El :attribute debe ser numérico',
        'ci_nit.digits_between' => 'El :attribute debe tener de :min a :max digitos',
        'ci_nit.unique' => 'El :attribute ya se encientra registrado'
    ];

    protected function personaStoreRules()
    {
        $rules = $this->personaRules['correo'];
        $rules[] = 'unique:App\Core\Models\Persona,correo';
        $this->personaRules['correo'] = $rules;
        $rules = $this->personaRules['ci_nit'];
        $rules[] = 'unique:App\Core\Models\Persona,ci_nit';
        $this->personaRules['ci_nit'] = $rules;
        return $this->personaRules;
    }

    protected function personaUpdateRules($id)
    {
        $rules = $this->personaRules['correo'];
        $rules[] = new NuevoCorreo($id);
        $this->personaRules['correo'] = $rules;
        $rules = $this->personaRules['ci_nit'];
        $rules[] = new NuevoCiNit($id);
        $this->personaRules['ci_nit'] = $rules;
        return $this->personaRules;
    }
}
