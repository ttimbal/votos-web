<?php

namespace App\Rules;

use App\Core\Repositories\PersonaRepository;
use Illuminate\Contracts\Validation\Rule;

class NuevoCorreo implements Rule
{
    protected $personaRepository;
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->personaRepository = new PersonaRepository();
        $this->id = $id; //id de la persona que es esta actualizando
    }

    /**
     * Determine if the validation rule passes.
     *
     * Nota.- un correo se considera nuevo si nadie lo registro o si es el mismo que posee la persona actual
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
            if ($persona->correo == $value && $persona->id != $this->id)
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
        return 'El correo ya fue registrado';
    }
}
