@extends('layouts.layout')

@section('page-title', 'Forum')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-4">
                    <h4>Foro de amigos</h4>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-8">
                    @if(Auth()->check())
                    <button class="btn btn-info" id="add-post-btn" data-toggle="modal" data-target="#create-post-modal">
                        <i class="fas fa-paw"></i>
                        <span> Crear publicación</span>
                    </button>
                    @else 
                        <span class="h5">Inicie sesión para publicar</span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-4 border-right">
                    <h4>Categorias</h4>
                    <div class="list-group list-group-flush">
                        <a href="/forum" class="list-group-item"> Todo </a>
                    @if($categories)
                        @foreach($categories as $category)
                        <a href="/forum/category/{{ $category->descripcion }}" class="list-group-item"> {{ $category->descripcion }} </a>
                        @endforeach
                    @endif
                    </div>    
                </div>
                <div class="col-sm-12 col-md-9 col-lg-8" id="forum-posts-container">
                @if ($posts)
                    @foreach($posts as $post)
                    <div class="container-fluid post">
                        <div class="row">
                            <div class="d-none d-md-block col-2 user-forum-info">
                                <img src="{{asset('img/user-img/user-generic-photo.jpg')}}" class="forum-post-user-img" alt="Imagen de usuario">
                                <a href="/profile/{{ $post->id }}" target="_blank" rel="noopener noreferrer">    
                                    <p class="h6"> {{ $post->nickname }} </p>
                                </a>
                            </div>
                            <div class="col-9">
                                <a href="/post/{{ $post->id_publicacion }}"><h4>{{ $post->titulo }}</h4></a>
                                <h6><i class="far fa-clock"></i> {{ $post->created_at }} </h6>
                                <p>{{ $post->texto }}</p>
                            </div>
                            <div class="col-1">
                                <div class="dropdown">
                                    <button class="close" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu display-inline dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Reportar</a>
                                        <a class="dropdown-item" href="#">Ocultar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
    @if(Auth()->check())
    <div class="modal" tabindex="-1" role="dialog" id="create-post-modal" role="dialog" aria-labelledby="add-post-btn" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/createpost" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar publicacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <label for="post-title">Titulo.</label>
                            <input type="text" name="title" id="post-title-input" class="form-control">
                            <label for="post-category">Categoria.</label>
                            <select name="category" id="post-category" class="form-control">
                            <option value="0"> - Seleccione una categoria - </option>
                            @if($categories)
                                @foreach($categories as $category)
                                <option value="{{ $category->id_categoria }}"> {{ $category->descripcion }} </option>
                                @endforeach
                            @endif
                            </select>
                            <label for="post-text">Texto.</label>
                            <textarea name="text" id="text" cols="20" rows="5" class="form-control" maxlength="250"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection