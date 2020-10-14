<?php

namespace App\Rules;

use App\Core\Repositories\PersonaRepository;
use Illuminate\Contracts\Validation\Rule;

class NuevoCiNit implements Rule
{
    protected $personaRepository;
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @param $id el identificador de la persona actual
     */
    public function __construct($id)
    {
        $this->personaRepository = new PersonaRepository();
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * Nota.- un Ci/Nit se considera nuevo si no fue registrado por nadie o
     * le pertenece a la misma persona que esta actualiza en este momento
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $personas = $this->personaRepository->all();
        foreach ($personas as $persona)
        {
            if ($persona->ci_nit == $value && $persona->id != $this->id)
            {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El Ci/Nit ya fue registrado';
    }
}
