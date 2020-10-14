<?php

namespace App\Rules;

use App\Core\Repositories\TelefonoRepository;
use Illuminate\Contracts\Validation\Rule;

class NuevoTelefono implements Rule
{
    protected $telefonoRepository;
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->telefonoRepository = new TelefonoRepository();
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $telefonos = $this->telefonoRepository->all();
        foreach ($telefonos as $telefono)
        {
            if ($telefono->numero == $value && $telefono->persona_id != $this->id)
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
        return 'El teléfono ya fue registrado';
    }
}
