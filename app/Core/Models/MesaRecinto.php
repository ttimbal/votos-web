<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class MesaRecinto extends Model
{
    protected $table = 'mesa_recinto';

    public $timestamps = true;

    protected $fillable = ['nulos', 'blancos','recinto_id','mesa_nro','con_votos'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
