<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';

    public $timestamps = true;

    protected $fillable = ['fecha', 'hora','descripcion','user_id','mesa_recinto_id','postulante_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
