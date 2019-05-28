<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Mascota;
use App\Perdido;

class perdidoController extends Controller
{
    //
    public function Show()
    {
        $perdidosInfo = [
            'perdidos' => Perdido::selectRaw()
                          ->join('mascotas', 'perdidos.id_mascota', '=', 'mascotas.id_mascota')
                          ->join('foto_mascotas', 'mascotas.id_mascota', '=', 'foto_mascotas.id_mascota')
                          ->groupBy('mascotas.id_mascota')
                          ->orderBy('perdidos.created_at')
                          ->get(),
        ];
        return view('lostFriends', $perdidosInfo);
    }

    public function create(Request $request)
    {
        $idPet = $request->input('id_mascota');
        Perdido::create([
            'lugar' => $request->input('lugar'),
            'info_adicional' => $request->input('info'),
            'id_mascota' => $idPet,
        ]);

        $mascota = Mascota::where('id_mascota', '=', $idPet);
        $mascota->id_status = 2;
        $mascota->save();
        
        return redirect()->back();
    }

}
