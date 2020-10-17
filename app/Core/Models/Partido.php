<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partido';

    public $timestamps = true;

    protected $fillable = ['nombre','cargo','partido_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function postulantes()
    {
        return $this->hasMany('App\Core\Models\Postulante');
    }
}
