<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perdido extends Model
{
    use softDeletes;
    //
    public function Mascota()
    {
        return $this->belongsTo('App\Mascota');
    }
}
