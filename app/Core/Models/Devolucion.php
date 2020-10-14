<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devoluciones';

    public $timestamps = true;

    protected $fillable = ['fecha', 'hora', 'persona_id', 'administrativo_id', 'prestamo_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * representa a la persona (cliente) que regresara el prestamo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id','id');
    }

    /**
     * representa a la persona (administrativo) que recibira el prestamo (como devolucion) y que solo contiene sus datos como persona
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administrativo_persona()
    {
        return $this->belongsTo(Persona::class,'administrativo_id','id');
    }
}
