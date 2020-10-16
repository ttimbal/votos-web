<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class VotoPostulante extends Model
{
    protected $table = 'voto_postulante';

    public $timestamps = true;

    protected $fillable = ['mesa_recinto_id', 'postulante_id','votos'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
