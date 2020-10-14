<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Afinidad extends Model
{
    protected $table = 'afinidades';

    protected $primaryKey = ['docente_id', 'especialidad_id'];
    protected $keyType = ['int', 'int'];
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['docente_id', 'especialidad_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Afinidad::class,'especialidad_id','id');
    }
}
