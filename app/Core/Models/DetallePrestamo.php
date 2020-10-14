<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePrestamo extends Model
{
    protected $table = 'detalle_prestamos';

    protected $primaryKey = ['prestamo_id', 'instrumento_numero'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['prestamo_id', 'instrumento_numero', 'estado'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
