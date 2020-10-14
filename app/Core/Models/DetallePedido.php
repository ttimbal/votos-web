<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';

    protected $primaryKey = ['nombre_instrumento_id', 'pedido_numero'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['nombre_intrumento_id', 'pedido_numero', 'cantidad'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
