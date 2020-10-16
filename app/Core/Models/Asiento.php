<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $table = 'asiento';

    public $timestamps = true;

    protected $fillable = ['nombre', 'municipio_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function recintos()
    {
        return $this->hasMany('App\Core\Models\Recinto');
    }
}
