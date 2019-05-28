<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusMascota extends Model
{
    //
    public function Mascota()
    {
        return $this->belongsTo('App\Mascota');
    }
}
