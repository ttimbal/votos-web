<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaCurso extends Model
{
    protected $table = 'materia_cursos';

    protected $primaryKey = ['materia_sigla', 'curso_codigo'];
    protected $keyType = ['string', 'int'];
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['materia_sigla', 'curso_codigo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
