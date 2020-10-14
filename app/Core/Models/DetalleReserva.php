<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleReserva extends Model
{
    protected $table = 'detalle_reservas';

    protected $primaryKey = ['reserva_id', 'instrumento_numero'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['prestamo_id', 'instrumento_numero'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
