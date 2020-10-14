<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $primaryKey = 'persona_id';
    protected $keyType = 'int';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['persona_id', 'ciudad'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function persona() {
        return $this->belongsTo(Persona::class,'persona_id');
    }

    public function telefonos() {
        return $this->hasMany(Telefono::class,'persona_id','persona_id');
    }
}
