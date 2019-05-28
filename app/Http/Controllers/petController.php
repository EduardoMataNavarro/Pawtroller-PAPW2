<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Raza;
use App\colorMascota;
use App\Mascota;
use App\fotoMascota;
use App\videoMascota;
use App\Perdido;

class petController extends Controller
{
    //
    public function show($id)
    {
        
        $petInfo = [
            'mascotaInfo'  => Mascota::selectRaw('mascotas.id_mascota,
                                                  mascotas.nombreMascota,
                                                  mascotas.comentarios,
                                                  mascotas.id_status,
                                                  razas.descripcion mascotaRaza,
                                                  color_mascotas.descripcion mascotaColor,
                                                  status_mascotas.descripcion status')
                                ->join('razas', 'razas.id_raza', '=', 'mascotas.id_raza')
                                ->join('color_mascotas', 'color_mascotas.id_color', '=', 'mascotas.id_color')
                                ->join('status_mascotas', 'mascotas.id_status', '=', 'status_mascotas.id')
                                ->where('id_mascota', '=', $id)->first(),
            'mascotaFotos' => fotoMascota::where('id_mascota', '=', $id)->get(),
            'mascotaVideos'=> videoMascota::where('id_mascota', '=', $id)->get(),
            'ownerData'    => User::select('name', 'id', 'nickname', 'email', 'telefono')
                                    ->join('mascotas', 'users.id', '=', 'mascotas.id_usuario')
                                    ->where('mascotas.id_mascota', '=', $id)->first(),
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
            'mascotas' => Perdido::selectRaw('mascotas.id_mascota,
                                              mascotas.nombreMascota,
                                              perdidos.lugar,
                                              perdidos.info_adicional,
                                              perdidos.created_at')
                          ->join('mascotas', 'perdidos.id_mascota', '=', 'mascotas.id_mascota')
                          ->get(),
            'razas' => Raza::all(),
            'colores' => colorMascota::all(),
        ];
        return view('pages.lostFriends', $data);
    }

    public function create(Request $request)
    {
        $mascota = Mascota::create([
            'nombreMascota' => $request->input('nombre'),
            'estatus'       => 1,
            'id_usuario'    => Auth::user()->id,
            'id_status'       => 1,
            'id_color'      => $request->input('color'),
            'id_raza'       => $request->input('raza'),
            'comentarios'   => $request->input('comentarios'),
        ]);
        return redirect()->route('pet', $mascota->id);
    }

    public function changePetStatus(Request $request)
    {
        $petId = $request->input('id_mascota');
        $statusId = $request->input('status');

        $petInfo = Mascota::where('id_mascota', '=', $petId);
        $petInfo->id_status = $statusId;
        $petInfo->save();

        if($statusId == 2)
        {
            Perdido::destroy('id_mascota', '=', $petId);
        }

        $status = StatusMascota::select('descripcion')->where('id', '=', $statusId);
        return response()->json([$status]);
    }

    public function uploadMedia(Request $request)
    {
        $mediaType = $request->input("type");
        $id_mascota = $request->input("id_mascota");

        if ($request->hasFile("media")) 
        {
            $media = $request->file("media");

            $folder = "petMedia/".$mediaType;
            $mediaLocation = Storage::disk('s3')->putFile($folder, $media);
            $mediaLocation = str_replace('/', '\\', $mediaLocation);
            $mediaPath = env("AWS_URL")."\\".$mediaLocation;
            $mediaFormat = $media->getClientOriginalExtension();

            $element = "";
            if($mediaType == "video"){
                videoMascota::create([
                    'path' => $mediaPath,
                    'format' => $mediaFormat,
                    'id_mascota' => $id_mascota,
                ]);
                $element = "<div class='col-sm-12 col-md-6 col-lg-4 pet-multimedia'><video class='w-100' controls><source src='".$mediaPath."' type='video/".$mediaFormat."'></video></div>";
            }
            if($mediaType == "photo"){
                fotoMascota::create([
                    'path' => $mediaPath,
                    'format' => $mediaFormat,
                    'id_mascota' => $id_mascota,
                ]);
                $element = "<div class='col-xs-6 col-md-4 col-lg-3 pet-multimedia'><img src='".$mediaPath."' class='img-fluid pet-gallery-img' alt='Imagen de mascota'></div>";
            }
            return response()->json(['element' => $element]);
        }
    }

    public function edit(Request $request, $id)
    {
        
    }
}
