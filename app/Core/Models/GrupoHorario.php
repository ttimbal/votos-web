<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoHorario extends Model
{
    protected $table = 'grupo_horarios';

    protected $primaryKey = ['grupo_id', 'horario_id'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['grupo_id', 'horario_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
