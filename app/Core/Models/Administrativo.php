<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    protected $table = 'administrativos';

    protected $primaryKey = 'persona_id';
    protected $keyType = 'int';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['persona_id', 'cargo', 'inicio'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //usando eloquent

    public function persona() {
        return $this->belongsTo(Persona::class,'persona_id');
    }

    public function telefonos() {
        return $this->hasMany(Telefono::class,'persona_id','persona_id');
    }
}
