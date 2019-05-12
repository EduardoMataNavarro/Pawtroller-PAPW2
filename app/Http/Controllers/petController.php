<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Request;

class petController extends Controller
{
    //
    public function show($id)
    {
        
        $petInfo = [
            'mascotaInfo'  => Mascota::where('id_mascota', '=', $id),
            'mascotaFotos' => fotoMascota::where('id_mascota', '=', $id),
            'mascotaVideos'=> videoMascota::where('id_mascota', '=', $id),
            'ownerData'    => User::select('name', 'nickname', 'email', 'telefono')
                                    ->join('mascota', 'users.id', '=', 'mascota.id_usuario')
                                    ->where('mascota.id_mascota', '=', $id),
        ];
        return view('pages.pet', $petInfo);
    }

    public function showLostPets()
    {
        /* 
            1 = Good,
            2 = Lost, 
            3 = Deceased
        */
        $data = [
            'mascotas' => Mascota::where('status', '=', 2),
        ];
        return view('pages.lostFriends', $data);
    }

    public function create(Request $request)
    {
        Mascota::create([
            'nombreMascota' => $request->input('nombreMascota'),
            'estatus'       => 1,
            'id_usuario'    => Auth::user()->id,
            'estatus'       => $request->input('id_raza'),
            'id_color'      => $request->input('id_color'),
            'comentarios'   => $request->input('comentarios'),
        ]);
    }

    public function edit(Request $request, $id)
    {
        
    }
}
