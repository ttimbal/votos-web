<?php


namespace App\Http\Requests;


use App\Rules\NuevoTelefono;

trait TelefonoRulesTrait
{
    protected $telefonoRules = [
        'telefonos' => 'required|array|between:1,3',
        'telefonos.*' => ['required', 'integer', 'digits_between:7,10']
    ];

    protected $telefonoAttributes = [
        'telefonos' => 'teléfonos',
        'telefonos.*' => 'teléfono'
    ];

    protected $telefonoMessages = [
        'telefonos.required' => 'Los :attribute son requeridos',
        'telefonos.array' => 'Los :attribute deben ser un conjunto de numeros telefonicos',
        'telefonos.between' => 'Deben de existir solo de :min a :max :attribute',
        'telefonos.*.required' => 'El :attribute es requerido',
        'telefonos.*.integer' => 'El :attribute debe ser un número',
        'telefonos.*.digits_between' => 'El :attribute debe tener de :min a :max dígitos',
        'telefonos.*.unique' => 'El :attribute ya se encuentra registrado'
    ];

    protected function telefonoStoreRules()
    {
        $rules = $this->telefonoRules['telefonos.*'];
        $rules[] = 'unique:App\Core\Models\Telefono,numero';
        $this->telefonoRules['telefonos.*'] = $rules;
        return $this->telefonoRules;
    }

    protected function telefonoUpdateRules($id)
    {
        $rules = $this->telefonoRules['telefonos.*'];
        $rules[] = new NuevoTelefono($id);
        $this->telefonoRules['telefonos.*'] = $rules;
        return $this->telefonoRules;
    }
}
