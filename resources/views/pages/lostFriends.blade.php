@extends('layouts.layout')

@section('page-title', 'Perdidos')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="container">
            <h4>Amigos perdidos</h4>
            <hr>
            <div class="row">
                <div class="col-2">
                    <form action="" method="get">
                        <label for="pet-type-combo">Tipo</label>
                        <select name="pet-type" id="pet-type-combo" class="form-control">
                            <option value="exotico">Exotico</option>
                            <option value="ave">Ave</option>
                            <option value="perro">Perro</option>
                            <option value="gato">Gato</option>
                            <option value="ganado">Ganado</option>
                        </select>
                        <button class="btn btn-login" type="button">
                            Filtrar
                        </button>
                    </form>
                    <hr>
                </div>
                <div class="col-10">
                    <h6>Perdidos recientemente</h6>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{asset('img/pet-img/dog.jpg')}}"  alt="" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">Amigo</h4>
                                    <hr>
                                    <p class="card-text">
                                        <i class="fas fa-map-marker-alt"></i> San Nicolas, Nuevo León, MX
                                        <br>
                                        Responde al nombre de Rigo
                                        <br>
                                        Visto por última vez cerca de Wal-mart Las torres.
                                    </p>
                                </div>
                                <a href="/pet" class="btn btn-login">Detalles</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <img src="{{asset('img/pet-img/dog1.jpg')}}" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">Marrano</h4>
                                    <hr>
                                    <p class="card-text">
                                        <i class="fas fa-map-marker-alt"></i> San Nicolas, Nuevo León, MX
                                        <br>
                                        Responde al nombre de Marrano
                                        <br>
                                        Visto por última vez cerca de Hda. Los Morales.
                                    </p>
                                </div>
                                <a href="/pet" class="btn btn-login">Detalles</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <img src="{{asset('img/pet-img/dog2.jpg')}}" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">Borrego</h4>
                                    <hr>
                                    <p class="card-text">
                                        <i class="fas fa-map-marker-alt"></i> Santa Catarina, Nuevo León, MX
                                        <br>
                                        Está muy gordo para correr
                                        <br>
                                        Visto por última vez cerca de Valle Poniente.
                                    </p>
                                </div>
                                <a href="/pet" class="btn btn-login">Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection