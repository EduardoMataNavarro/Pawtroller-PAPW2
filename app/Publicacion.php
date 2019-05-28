<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacion extends Model
{
    use softDeletes;
    protected $fillable = [
        'titulo', 'texto', 'id_usuario','reportado', 'id_categoria',    
    ];
    protected $primaryKey = 'id_publicacion';
    //
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Comentario()
    {
        return $this->hasMany('App\Comentario');
    }
    public function categoriaPublicacion()
    {
        return $this->hasOne('App\categoriaPublicacion');
    }
}
