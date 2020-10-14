<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $primaryKey = 'numero';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['fecha', 'proveedor_id', 'pedido_numero'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Persona::class,'proveedor_id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'pedido_numero');
    }
}
