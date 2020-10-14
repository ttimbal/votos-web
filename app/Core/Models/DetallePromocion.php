<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePromocion extends Model
{
    protected $table = 'detalle_promociones';

    protected $primaryKey = ['materia_sigla', 'promocion_id'];
    protected $keyType = ['string', 'int'];
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['materia_sigla', 'promocion_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
