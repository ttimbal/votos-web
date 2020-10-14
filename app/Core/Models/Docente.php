<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $primaryKey = 'persona_id';
    protected $keyType = 'int';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['persona_id', 'inicio'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //usando eloquent

    /**
     * obtiene la persona relacionada con el docente actual
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id');
    }

    /**
     * simula que tuviera contectada directo con la clase telefono
     * por que comparten el mismo persona_id como foranea en telefono
     * y primaria en docente
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefonos()
    {
        return $this->hasMany(Telefono::class,'persona_id','persona_id');
    }
}
