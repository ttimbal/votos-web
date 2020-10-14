<?php


namespace App\Core\Repositories;


use App\Core\Models\NombreInstrumento;

class NombreInstrumentoRepository
{
    public function all()
    {
        return NombreInstrumento::all();
    }
}
