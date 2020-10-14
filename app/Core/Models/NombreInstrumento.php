<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class NombreInstrumento extends Model
{
    protected $table = 'nombre_instrumentos';

    public $timestamps = true;

    protected $fillable = ['nombre'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
