<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perdido extends Model
{
    //
    public function Mascota()
    {
        return $this->belongsTo('App\Mascota');
    }
}
