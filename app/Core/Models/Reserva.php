<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    protected $table = 'reservas';

    public $timestamps = true;

    protected $fillable = ['fecha', 'hora', 'prestamo_realizado','instrumento_numero', 'docente_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
