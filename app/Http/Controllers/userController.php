<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Publicacion;
use App\Mascota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\fotoMascota;
use App\colorMascota;
use App\Raza;

class userController extends Controller
{
    //
    public function show($id)
    {
        $userData = [
            'user' => User::findOrFail($id),
            'posts' => Publicacion::where('id_usuario', '=', $id)->get(),
            'mascotas' => Mascota::where('id_usuario', '=', $id)->get(),
            /*'mascotas' => Mascota::selectRaw('mascotas.id_mascota,
                                              mascotas.nombreMascota,
                                              mascotas.comentarios,
                                              foto_mascotas.path')
                            ->join('foto_mascotas', 'foto_mascotas.id_mascota', '=', 'mascotas.id_mascota')
                            ->where('mascotas.id_usuario', '=', $id)
                            ->groupBy('mascotas.id_mascota')->get(),*/
            'colores' => colorMascota::all(),
            'razas' => Raza::all(),
        ];
        return view('pages.profile', $userData);
    }
    public function logOut()
    {
        Auth::logout(); 
        Session::flush();
        return redirect('/');
    }

    /*
    public function edit(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

    }*/
    
    public function uploadPhoto(Request $request)
    {
        if ($request->hasFile('photo')) {

            $image = $request->file('photo');
            $imgtype = $request->input("type");

            $imageFolder = "userimg/".$imgtype;
            $imglocation = Storage::disk('s3')->putFile($imageFolder, $image);
            $imglocation = str_replace('/', '\\', $imglocation);

            $imgpath = env("AWS_URL")."\\".$imglocation;

            $user = Auth::user();
            if ($imgtype == "banner"){
                $user->bannerPicPath = $imgpath;
            }
            if($imgtype == "avatar"){ 
                $user->avatarPicPath = $imgpath;
            }

            $user->save();

            return response()->json(['imgpath' => $imgpath]);
        }
        return response()->json(['imgpath' => '']);
    }
}
