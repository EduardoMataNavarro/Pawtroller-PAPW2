<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raza extends Model
{
    use softDeletes;
    //
    public function Mascota()
    {
        return $this->belongsToMany('App\Mascota');
    }
}
