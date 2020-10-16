<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';

    public $timestamps = true;

    protected $fillable = ['nombre', 'circunscripcion_nro'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function asientos()
    {
        return $this->hasMany('App\Core\Models\Asiento');
    }


}
