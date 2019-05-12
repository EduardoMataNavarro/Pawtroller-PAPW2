<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    //
    public function showPosts()
    {
        $postsInfo = Publicacion::orderBy('created_at', 'desc');
        return view('paginas.forum', $postsInfo);
    }

    public function showPost($id)
    {
        $postInfo = [
            'postContent'  => Publicacion::where('id_publicacion', '=', $id),
            'postComments' => Comentario::where('id_publicacion', '=', $id),
        ];

        return view('paginas.post', $postInfo);
    }

    public function create(Request $request)
    {
        $newPost = Publicacion::create([
            'titulo' => $request->input('titulo'),
            'texto' => $request->input('texto'),
            'id_usuario' => Auth::id(),
            'reportado' => 0,
        ]);
        return redirect()->route('showpost', ['id' => $newPost->id_publicacion]);
    }

    public function delete($id)
    {

    }
}
