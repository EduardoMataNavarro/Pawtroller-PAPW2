<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use softDeletes;
    //
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
}
