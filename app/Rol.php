<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
}
