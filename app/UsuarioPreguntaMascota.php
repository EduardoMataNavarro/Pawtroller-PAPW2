<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPreguntaMascota extends Model
{
    //
    use softDeletes;

    protected $fillable = [
        'id_usuario_pregunta', 'id_usuario_responde', 'id_mascota', 'pregunta',
    ];

    public function UsuarioPregunta(){
        return $this->belongsToMany('App\User');
    }

    public function UsuarioResponde(){
        return $this->belongsToMany('App\User');
    }
    
    public function Mascota(){
        return $this->belongsToMany('App\Mascota');
    }
}
