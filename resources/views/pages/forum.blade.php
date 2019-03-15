@extends('layouts.layout')

@section('page-title', 'Forum')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="container">
            <h4>Foro de amigos</h4>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-4 border-right">
                    <h4>Categorias</h4>
                    <div class="list-group list-group-flush">
                        <a href="" class="list-group-item">Avisos</a>
                        <a href="" class="list-group-item">Exóticos</a>
                        <a href="" class="list-group-item">Recomendaciones</a>
                        <a href="" class="list-group-item">Alertas</a>
                        <a href="" class="list-group-item">Noticias</a>
                    </div>    
                </div>
                <div class="col-sm-12 col-md-9 col-lg-8" id="forum-posts-container">
                    <div class="container-fluid post">
                        <div class="row">
                            <div class="col-2 user-forum-info">
                                <a href="" target="_blank" rel="noopener noreferrer">
                                    <img src="{{asset('img/user-img/user-generic-photo.jpg')}}" class="forum-post-user-img" alt="Imagen de usuario">
                                    <h6>Nickname</h6>
                                </a>
                            </div>
                            <div class="col-9">
                                <a href="/post" target="_blank" rel="noopener noreferrer">
                                    <h4>Titulo del hilo</h4>
                                    <h6><i class="far fa-clock"></i> 12-3-2018 06:12pm</h6>
                                    <span class="badge badge-success">Cachorros</span>
                                    <span class="badge badge-success">Perros</span>    
                                </a>
                                <p>
                                    Este es una prueba de un post escrito, aquí se puede escribir cualquier cosa como un
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, rem! Odio aliquam corporis ab est perspiciatis labore nisi qui nobis doloribus! Odio nihil sint molestias sapiente est laudantium error quos.
                                </p>
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
                    <div class="container-fluid post">
                        <div class="row">
                            <div class="col-2 user-forum-info">
                                <a href="" target="_blank" rel="noopener noreferrer">
                                    <img src="{{asset('img/user-img/user-generic-photo.jpg')}}" class="forum-post-user-img" alt="Imagen de usuario">
                                    <h6>Nickname</h6>
                                </a>
                            </div>
                            <div class="col-9">
                                <a href="/post" target="_blank" rel="noopener noreferrer">
                                    <h4>Titulo del hilo</h4>
                                    <h6><i class="far fa-clock"></i> 12-3-2018 06:12pm</h6> 
                                    <span class="badge badge-success">Cachorros</span>
                                    <span class="badge badge-success">Perros</span>   
                                </a>
                                <p>
                                    Este es una prueba de un post escrito, aquí se puede escribir cualquier cosa como un
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, rem! Odio aliquam corporis ab est perspiciatis labore nisi qui nobis doloribus! Odio nihil sint molestias sapiente est laudantium error quos.
                                </p>
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
                </div>
            </div>
        </div>
    </div>
@endsection