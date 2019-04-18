<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
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
