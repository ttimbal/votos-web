<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    public $timestamps = true;

    protected $fillable = ['fecha', 'hora','fecha_devolver','hora_devolver', 'persona_id', 'administrativo_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * representa a la persona que recibe el prestamo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id','id');
    }

    /**
     * representa el administrativo como persona(solo los datos de la persona)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administrativo_persona()
    {
        return $this->belongsTo(Persona::class,'administrativo_id','id');
    }

    /**
     * representa al administrativo como tal(solo los datos del administrativo)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administrativo()
    {
        return$this->belongsTo(Administrativo::class,'adminsitrativo_id','persona_id');
    }

}
