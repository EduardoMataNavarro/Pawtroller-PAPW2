<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\Publicacion;
use App\Comentario;
use App\categoriaPublicacion;
use App\ComentarioCalificacionUsuario;
use App\PublicacionCalificacionUsuario;

class postController extends Controller
{
    //
    public function showPosts()
    {
        $postsInfo = [
            'posts' => Publicacion::selectRaw('publicacions.id_publicacion, 
                                               users.id, 
                                               publicacions.texto, 
                                               publicacions.titulo,
                                               publicacions.created_at, 
                                               users.nickname, 
                                               users.avatarPicPath')
                        ->where('publicacions.borrador', '=', false)
                        ->OrderBy('publicacions.created_at', 'desc')
                        ->join('users', 'users.id', '=', 'publicacions.id_usuario')->get(),
            'categories' => categoriaPublicacion::all(),
        ];
        return view('pages.forum', $postsInfo);
    }
    
    public function showPostsByCategory($name)
    {
        $postsInfo = [
            'posts' => Publicacion::selectRaw('publicacions.id_publicacion, 
                                                   users.id, 
                                                   publicacions.texto, 
                                                   publicacions.titulo,
                                                   publicacions.created_at, 
                                                   users.nickname, 
                                                   users.avatarPicPath')
                            ->OrderBy('publicacions.created_at', 'desc')
                            ->join('categoria_publicacions', 'publicacions.id_categoria', '=', 'categoria_publicacions.id_categoria')
                            ->join('users', 'users.id', '=', 'publicacions.id_usuario')
                            ->where('categoria_publicacions.descripcion', '=', $name)
                            ->where('publicacions.borrador', '=', false)
                            ->get(),
            'categories' => categoriaPublicacion::all(),
        ];

        return view('pages.forum', $postsInfo);
    }

    public function showPost($id)
    {
        $postInfo = [
            'postContent'  => Publicacion::selectRaw('publicacions.id_publicacion,
                                                      publicacions.titulo,
                                                      publicacions.texto,
                                                      publicacions.reportado,
                                                      publicacions.created_at,
                                                      categoria_publicacions.id_categoria,
                                                      categoria_publicacions.descripcion categoria')
                                ->join('users', 'users.id', '=', 'publicacions.id_usuario')
                                ->join('categoria_publicacions', 'publicacions.id_categoria', '=', 'categoria_publicacions.id_categoria')
                                ->where('publicacions.id_publicacion', '=', $id)
                                ->first(),
            'postComments' => Comentario::selectRaw('comentarios.id_comentario commentId,
                                                     comentarios.comentario,
                                                     comentarios.created_at,
                                                     users.id userId,
                                                     users.avatarPicPath,
                                                     users.nickname')->where('id_publicacion', '=', $id)
                                ->join('users', 'users.id', '=', 'comentarios.id_usuario')->get(),
            'postGoodRating'   => PublicacionCalificacionUsuario::where('id_publicacion', '=', $id)
                                ->Where('tipo', '=', 1)->count(),
            'postBadRating'   => PublicacionCalificacionUsuario::where('id_publicacion', '=', $id)
                                ->Where('tipo', '=', 0)->count(),
        ];

        return view('pages.post', $postInfo);
    }

    public function getPostInfo($id)
    {
        $postInfo = [
            'postContent'  => Publicacion::selectRaw('publicacions.id_publicacion,
                                                      publicacions.titulo,
                                                      publicacions.texto,
                                                      publicacions.reportado,
                                                      publicacions.created_at,
                                                      categoria_publicacions.id_categoria,
                                                      categoria_publicacions.descripcion categoria')
                                ->join('categoria_publicacions', 'publicacions.id_categoria', '=', 'categoria_publicacions.id_categoria')
                                ->where('publicacions.id_publicacion', '=', $id)
                                ->first(),
            'cats'  =>categoriaPublicacion::select('id_categoria', 'descripcion')->get(),
        ];
        return response()->json($postInfo);
    }

    public function create(Request $request)
    {
        /*   
        $validator = $request->validate([
            'title' => 'required|max:150',
            'category' => 'required|gt:0',
            'text' => 'required|max:250'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }*/
        
        $newPost = Publicacion::create([
            'titulo' => $request->input('title'),
            'texto' => $request->input('text'),
            'id_usuario' => Auth::id(),
            'id_categoria' => $request->input('category'),
            'reportado' => 0,
        ]);
        return redirect()->route('showpost', [$newPost->id]);
    }

    public function rate(Request $request)
    {
        $post_id = $request->input('id_publicacion');
        $tipo = $request->input('tipo');
        $record = PublicacionCalificacionUsuario::where('id_publicacion', '=', $post_id)
                                                    ->where('id_usuario', '=', Auth::id())->first();
        if($record)
        {
            if($record->tipo != $tipo)
            {
                $record->tipo = $tipo;
                $record->save();
            }
            else {
                PublicacionCalificacionUsuario::destroy($record->id);
            }
        }
        else 
        {
            PublicacionCalificacionUsuario::create([
                'id_publicacion' => $post_id,
                'id_usuario'    => Auth::id(),
                'tipo'      => $tipo,
            ]);
        }
        $goodRatings = PublicacionCalificacionUsuario::where('id_publicacion', '=', $post_id)
                                                        ->where('tipo', '=', 1)->count();
        $badRatings = PublicacionCalificacionUsuario::where('id_publicacion', '=', $post_id)
                                                        ->where('tipo', '=', 0)->count();
                                                        
        return response()->json(['goodRatings' => $goodRatings, 'badRatings' => $badRatings]);
    }
    
    public function delete($id)
    {
        Publicacion::destroy($id);
    }

    public function edit(Request $request)
    {
        $post_id = $request->input('id_post');

        $post = Publicacion::findOrFail($post_id);
        $post->titulo = $request->input('titulo');
        $post->texto = $request->input('texto');
        $post->id_categoria = $request->input('categoria');
        $post->save();

        return response()->back();
    }
}
