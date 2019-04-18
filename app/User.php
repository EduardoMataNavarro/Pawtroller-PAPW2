<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'correo', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Publicacion()
    {
        return $this->hasMany('App\Publicacion');
    }
    public function Mascota()
    {
        return $this->hasMany('App\Mascota');
    }
    public function ImagenUsuarioAvatar()
    {
        return $this->hasOne('App\imagenUsuarioAvatar');
    }
    public function ImagenUsuarioBanner()
    {
        return $this->hasOne('App\imagenUsuarioBanner');
    }
    public function Comentario()
    {
        return $this->hasMany('App\Comentario');
    }
}
