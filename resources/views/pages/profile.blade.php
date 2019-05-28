@extends('layouts.layout')

@section('page-title', 'Profile')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(Auth::check() && (Auth::id() == $user->id))
                    <button class="change-photo-btn" id="change-banner-btn"><i class="fas fa-camera"></i><span> Cambiar foto de portada</span></button>
                    @endif
                    <img src="{{ $user->bannerPicPath }}" class="img-fluid-c" id="user-banner-img" alt="Imagen de portada">
                    @if(Auth::check() && (Auth::id() == $user->id))
                    <div id="profile-avatar-img">
                        <img src="{{ $user->avatarPicPath }}" id="user-avatar-img" class="img-fluid" alt="Avatar image">
                        <button class="change-photo-btn" id="change-avatar-btn">
                            <i class="fas fa-camera"><span> Cambiar foto de perfil</span></i>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8 col-lg-6"  id="user-info-container">
                    <h5 class="text-center"> {{ $user->nickname }} </h5>
                    <h3 class="text-center">{{ $user->name}} {{$user->apellido}}</h3>
                </div>
                <input type="file" name="profile-banner" id="in-banner-img" accept="image/*" hidden>
                <input type="file" name="profile-avatar" id="in-avatar-img" accept="image/*" hidden>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row" id="profile-tab-list" >
                        <ul class="nav nav-pills" role="tablist">
                            <li class="col-xs-3 col-sm-4 col-lg-12 nav-item">
                                <a class="nav-link w-100 profile-pill active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            </li>
                            <li class="col-xs-3 col-sm-4 col-lg-12 nav-item">
                                <a class="nav-link w-100 profile-pill" id="nav-pets-tab" data-toggle="tab" href="#nav-pets" role="tab" aria-controls="nav-pets" aria-selected="false">Mascotas</a>                      
                            </li>
                            <li class="col-xs-3 col-sm-4 col-lg-12 nav-item">
                                <a class="nav-link w-100 profile-pill" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab" aria-controls="nav-posts" aria-selected="false">Foro</a>
                            </li>
                            @if($user->id == Auth::id())
                            <li class="col-xs-4 col-sm-4 col-lg-12 nav-item">
                                <a href="/logout" class="nav-link w-100 profile-pill" id="nav-logout-tab" aria-selected="false">Salir</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9 tab-content">
                    <div class="tab-pane fade show active profile-panel" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <span class="h3">Información</span>
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-7">
                                <br>
                                <label for="input-edit-name">Nombre:</label>
                                <p class="user-info-block"> {{ $user->name }} </p>
                                <br>
                                <label for="input-edit-apellidos">Apellidos:</label>
                                <p class="user-info-block"> {{ $user->apellido }} </p>
                                <br>
                                <label for="input-edit-nickname">Nickname:</label>
                                <p class="user-info-block"> {{ $user->nickname }} </p>
                                <br>
                                <label for="input-edit-nickname">Miembro desde:</label>
                                <p class="user-info-block"> {{ $user->created_at }} </p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show profile-panel" id="nav-pets" role="tabpanel" aria-labelledby="nav-home-tab">
                        <span class="h3">Mascotas</span>
                        @if($user->id == Auth::id())
                        <button class="btn btn-info float-right" data-toggle="modal" data-target="#pet-dialog">
                            <i class="fas fa-paw"></i> <span>Agregar mascota</span>
                        </button>
                        @endif
                        <hr>
                        <div class="row"> 
                        @foreach($mascotas as $mascota)
                            <div class="col-sm-6 col-md-6 col-lg-4 petContainer">
                                    <div class="card">
                                        <img src="{{ $mascota->path }}" alt="" class="card-image-top">
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ $mascota->nombreMascota }} </h5>
                                            <hr>
                                            <p class="card-text">
                                                {{ $mascota->comentarios }}
                                            </p>
                                        </div>
                                        <a href="/pet/{{ $mascota->id_mascota }}" class="btn btn-login">Ver mascota</a>
                                    </div> 
                                </div>
                                
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade show profile-panel" id="nav-posts" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h3>Posts</h3>
                        @foreach($posts as $post)
                        <div class="col-sm-12 col-md-6">
                            <div class="card recently-posted-card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="/post/{{ $post->id_publicacion }}">{{ $post->titulo }}</a> 
                                        <button class="close" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu display-inline dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item edit-post-btn" _pst-id="{{ $post->id_publicacion }}">Editar</button>
                                            {{ $post->borrador ? __('<button class="dropdown-item publish-post-btn"_pst-id="{ $post->id_publicacion }">Publicar</button>') : '' }}
                                            <button class="dropdown-item delete-post-btn" _pst-id="{{ $post->id_publicacion }}">Eliminar</button>
                                        </div>
                                    </h4>
                                    <p class="card-text post-display-text"> {{ $post->texto }} </p>
                                </div>
                            </div> 
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($user->id == Auth::id())
    <div class="modal fade" id="pet-dialog" tabindex="-1" role="dialog" aria-labelledby="open-pet-dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar mascota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/registerpet" method="post">
                    <div class="modal-body">
                            @csrf
                            <label for="nombremascota">Nombre de la mascota:</label>
                            <input type="text" name="nombre" id="nombremascota" class="form-control">
                            <label for="razamascota">Raza de la mascota:</label>
                            <select name="raza" id="razamascota" class="form-control">
                                <option value="0">-Seleccione una raza-</option>
                                @foreach($razas as $raza)
                                <option value="{{$raza->id_raza}}"> {{ $raza->descripcion }} </option>
                                @endforeach
                            </select>
                            <label for="colormascota">Color de la mascota:</label>
                            <select name="color" id="colormascota" class="form-control">
                                <option value="0">-Seleccione un color-</option>
                                @foreach($colores as $color)
                                <option value="{{ $color->id_color }}"> {{ $color->descripcion }} </option>
                                @endforeach
                            </select>
                            <label for="comentariosmascota">Comentarios:</label>
                            <input type="text" name="comentarios" id="comentariosmascota" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="clear" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-post-dialog" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar publicacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/editpost" method="post">
                    <div class="modal-body">
                            @csrf
                            <label for="edit-post-title">Titulo:</label>
                            <input type="text" name="titulo" id="edit-post-title" class="form-control">
                            <label for="edit-post-categoria"></label>
                            <select name="categoria" id="edit-post-categoria" class="form-control">
                            </select>
                            <label for="edit-post-texto">Texto:</label>
                            <textarea type="text" name="texto" id="edit-post-texto" class="form-control"></textarea>
                            <input type="hidden" name="id_post" id="edit-post-id" class="hidden">
                    </div>
                    <div class="modal-footer">
                        <button type="clear" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection