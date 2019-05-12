<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use App\Perdido;
use App\Publicacion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $landingContent = [
            'lostPets' => Perdido::Take('5')->join('mascota', 'mascota.id_mascota', '=', 'perdidos.id_mascota')->orderBy('perdidos.created_at', 'desc')->get(),
            'latestPosts' => Publicacion::Take('5')->join('users', 'publicacions.id_usuario', '=', 'users.id')->orderBy('publicacions.created_at', 'desc')->get(), 
        ];
        return view('pages.landing', $landingContent);
    }
}
