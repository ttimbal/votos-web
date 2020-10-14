<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

    public $timestamps = true;

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin', 'descuento'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
