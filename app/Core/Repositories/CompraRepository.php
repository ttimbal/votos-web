<?php


namespace App\Core\Repositories;


use App\Core\Models\Compra;

class CompraRepository
{
    public function all()
    {
        return Compra::all();
    }
}
