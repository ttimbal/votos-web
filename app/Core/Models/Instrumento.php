<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    protected $table = 'instrumentos';

    protected $primaryKey = 'numero';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['estado', 'precio', 'disponibilidad', 'almacen_codigo', 'nombre_instrumento_id', 'compra_numero'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function nombre_instrumento()
    {
        return $this->belongsTo(NombreInstrumento::class,'nombre_instrumento_id','id');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class,'almacen_codigo','codigo');
    }

    /**
     * metodo que devolvera a la que pertenece el instrumento
     */
    public function compra()
    {
        return $this->belongsTo(Compra::class,'compra_numero', 'numero');
    }
}
