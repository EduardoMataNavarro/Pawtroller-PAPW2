<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class colorMascota extends Model
{
    use SoftDeletes;
    //
    public function Mascota()
    {
        return $this->belongsToMany('App\Mascota');
    }
}
