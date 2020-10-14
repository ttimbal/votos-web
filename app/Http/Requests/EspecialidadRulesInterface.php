<?php


namespace App\Http\Requests;


interface EspecialidadRulesInterface
{
    const ESPECIALIDAD_RULES = [
        'especialidades' => 'required|array|between:1,3',
        'especialidades.*' => 'required|integer|exists:App\Core\Models\Especialidad,id'
    ];

    const ESPECIALIDAD_MESSAGES = [
        'especialidades.required' => 'Las :attribute son requeridas',
        'especialidades.array' => 'Las :attribute deben ser un conjunto de especialidades',
        'especialidades.between' => 'Deben de existir solo de :min a :max :attribute',
        'especialidades.*.required' => 'La :attribute es requerida',
        'especialidades.*.integer' => 'El tipo de dato de la :attribute no es correcto',
        'especialidades.*.exists' => 'La :attribute no se encuentra registrada'
    ];

    const ESPECIALIDAD_ATTRIBUTES = [
        'especialidades' => 'especialidades',
        'especialidades.*' => 'especialidad'
    ];
}
