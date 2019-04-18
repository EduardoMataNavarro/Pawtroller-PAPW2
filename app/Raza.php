<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    //
    public function Mascota()
    {
        return $this->belongsToMany('App\Mascota');
    }
}
