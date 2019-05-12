<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    }
    
    public function rateComment($id, $type)
    {
        if($type == true)
            Comentario::find($id)->increment('rating');
        else 
            Comentario::find($id)->decrement('rating');
    }

    public function delete($id)
    {
        
    }
}
