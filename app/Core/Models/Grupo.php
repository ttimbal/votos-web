<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    public $timestamps = true;

    protected $fillable = ['nombre', 'docente_id', 'materia_sigla', 'periodo_codigo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
