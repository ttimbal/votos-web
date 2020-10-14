<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';

    public $timestamps = true;

    protected $fillable = ['fecha', 'estado', 'persona_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //usando eloquent

    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id','id');
    }
}
