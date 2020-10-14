<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    public $timestamps = true;

    protected $fillable = ['nombre', 'direccion', 'activo', 'correo', 'ci_nit'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //usando eloquent

    public function docente() {
        return $this->hasOne(Docente::class,'persona_id','id');
    }

    public function administrativo() {
        return $this->hasOne(Administrativo::class,'persona_id','id');
    }

    public function proveedor() {
        return $this->hasOne(Proveedor::class,'persona_id','id');
    }

    public function telefonos() {
        return $this->hasMany(Telefono::class,'persona_id','id');
    }


}
