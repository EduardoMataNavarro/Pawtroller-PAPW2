<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicacionCalificacionUsuario extends Model
{
    //
    protected $fillable = [
        'id_usuario', 'id_publicacion', 'tipo',
    ];

    public function Publicacion(){
        return $this->belongsToMany('App\Publicacion');
    }
    public function User(){
        return $this->belongsToMany('App\Users');
    }
}
