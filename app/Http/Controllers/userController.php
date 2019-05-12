<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Publicacion;
use App\Mascota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function show($id)
    {
        $userData = [
            'user' => User::findOrFail($id),
            'posts' => Publicacion::where('id_usuario', '=', $id),
            'mascotas' => Mascota::where('id_usuario', '=', $id)
        ];
        return view('pages.profile', $userData);
    }
    public function logOut()
    {
        Auth::logout(); 
        Session::flush();
        return redirect('/');
    }
    public function edit($id)
    {
        $userData = [
            'user' => User::findOrFail($id),
            'posts' => Publicacion::where('id_usuario', '=', $id),
            'mascotas' => Mascota::where('id_usuario', '=', $id)
        ];
        return view('pages.profile', $userData);
    }
}
