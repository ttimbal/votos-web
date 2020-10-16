<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model;

class Circunscripcion extends Model
{
    protected $table = 'circunscripcion';

    public $timestamps = true;

    protected $fillable = ['nro'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
