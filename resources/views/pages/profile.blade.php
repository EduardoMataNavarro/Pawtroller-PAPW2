@extends('layouts.layout')

@section('page-title', 'Profile')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="row">
            <div class="col-12">
                <img src="{{asset('img/banner-img/cut.jpg')}}" class="img-fluid" id="profile-banner-img" alt="Imagen de portada">
            </div>
        </div>
        <div class="container">
            <div class="row" id="profile-user-info">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="{{asset('img/user-img/user-generic-photo.jpg')}}" class="img-fluid" id="profile-avatar-img" alt="Avatar image">
                    <h5> {{ $user->nickname }} </h5>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8">
                    <h3 id="profile-user-name">{{ $user->name}} {{$user->apellido}}</h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="row" id="profile-tab-list" >
                        <ul class="nav nav-pills" role="tablist">
                            <li class="col-xs-4 col-sm-4 col-lg-12 nav-item">
                                <a class="nav-link w-100 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            </li>
                            <li class="col-xs-4 col-sm-4 col-lg-12 nav-item">
                                <a class="nav-link w-100" id="nav-pets-tab" data-toggle="tab" href="#nav-pets" role="tab" aria-controls="nav-pets" aria-selected="false">Amigos</a>                      
                            </li>
                            <li class="col-xs-4 col-sm-4 col-lg-12 nav-item">
                                <a class="nav-link w-100" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab" aria-controls="nav-posts" aria-selected="false">Foro</a>
                            </li>
                            <li class="col-xs-4 col-sm-4 col-lg-12 nav-item">
                                <a href="/logout" class="nav-link w-100" id="nav-logout-tab" aria-selected="false">Salir</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-8 tab-content">
                    <div class="tab-pane fade show active profile-panel" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h3>Noticias</h3>
                        
                    </div>
                    <div class="tab-pane fade show profile-panel" id="nav-pets" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h3>Mascotas</h3>
                        @if ($mascotas)
                            @foreach($mascotas as $mascota)
                                {{ $mascota->nombreMascota }}
                            @endforeach
                        @else 
                            <div class="row">
                                <div class="col-12" style="width: 100%; height: 25vh;">
                                    <p class="display-4">No hay nada aquí</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade show profile-panel" id="nav-posts" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h3>Posts</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection