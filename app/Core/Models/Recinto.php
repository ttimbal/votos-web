<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
    protected $table = 'recinto';

    public $timestamps = true;

    protected $fillable = ['nombre', 'direccion','cantidad_mesas','asiento_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

}
