<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perdido extends Model
{
    use softDeletes;
    //
    protected $fillable = [
        'lugar', 'info_adicional', 'latitude','longitude', 'id_mascota',
    ];

    protected $primaryKey = 'id_perdida';
    public function Mascota()
    {
        return $this->belongsTo('App\Mascota');
    }
}
