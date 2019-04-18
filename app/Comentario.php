<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    public function Comentario()
    {
        return $this->belongsTo('App\Publicacion');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
