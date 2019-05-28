<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'comentario', 'id_publicacion', 'id_usuario', 'rating', 'reportado',
    ];

    public function Comentario()
    {
        return $this->belongsTo('App\Publicacion');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
