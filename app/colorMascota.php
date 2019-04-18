<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colorMascota extends Model
{
    //
    public function Mascota()
    {
        return $this->belongsToMany('App\Mascota');
    }
}
