<?php

namespace App\Core\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';

    public $timestamps = true;

    protected $fillable = ['inicio', 'fin', 'user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //usando eloquent

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
