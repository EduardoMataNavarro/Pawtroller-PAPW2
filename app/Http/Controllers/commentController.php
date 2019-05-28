<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comentario;
use App\ComentarioCalificacionUsuario;

class commentController extends Controller
{
    //
    public function create(Request $request)
    {
        $newComment = Comentario::create([
                'comentario' => $request->input('comentario'),
                'id_publicacion' => $request->input('id_publicacion'),
                'id_usuario' => Auth::id(),
                'reportado' => 0,
        ]);
        return redirect()->back();
    }
    /*
    public function rate(Request $request)
    {
        $id_comentario = $request->input('id_comentario');
        $tipo = $request->input('tipo');

        $record = ComentarioCalificacionUsuario::where('id_comentario','=',$id_comentario)
                                                    ->where('id_usuario','=', Auth::id())->first();
        if($record){
            if ($record->tipo != $tipo) {
                $record->tipo = $tipo;
                $record->save();
            }
            else {
                ComentarioCalificacionUsuario::destroy($record->id);
            }
        }
        else 
        {
            ComentarioCalificacionUsuario::create([
                'id_comentario' => $id_comentario,
                'id_usuario' => Auth::id(),
                'tipo' => $tipo,
            ]);
        }
    }
    */
    public function delete($id)
    {
        
    }
}
