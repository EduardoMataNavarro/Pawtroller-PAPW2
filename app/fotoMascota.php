<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotoMascota extends Model
{
    //
    protected $fillable = [
        'path', 'format', 'id_mascota','name', 
    ];

    public function Mascota()
    {
        return $this->belongsToMany('App\Mascota');
    }
}
