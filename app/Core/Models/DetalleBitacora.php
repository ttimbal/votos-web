<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleBitacora extends Model
{
    protected $table = 'detalle_bitacoras';

    public $timestamps = true;

    protected $fillable = ['hora', 'accion', 'bitacora_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //usando eloquent

    public function bitacoras()
    {
        return $this->belongsTo(Bitacora::class,'bitacora_id','id');
    }
}
