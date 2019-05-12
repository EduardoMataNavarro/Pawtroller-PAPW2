<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacion extends Model
{
    use softDeletes;
    //
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Comentario()
    {
        return $this->hasMany('App\Comentario');
    }
}
