<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentarioCalificacionUsuario extends Model
{
    //
    protected $fillable = [
        'id_usuario', 'id_comentario', 'tipo',
    ];
    public function Comentario()
    {
        return $this->belongsToMany('App\Comentario');
    }
    public function Usuario()
    {
        return $this->belongsToMany('App\User');
    }
}
