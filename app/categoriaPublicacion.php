<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriaPublicacion extends Model
{
    //
    public function categoriaPublicacion()
    {
        return $this->belongsToMany('App\Publicacion');
    }
}
