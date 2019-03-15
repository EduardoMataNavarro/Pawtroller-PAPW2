@extends('layouts.layout')

@section('page-title', 'Login')

@section('content')
    <div class="container-fluid content-wrapper" id="profile-container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-7" id="doge-background">
                <img src="{{asset('img/dog-login.png')}}" class="img-fluid" alt="'LogIn please' says the puppy">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="true">Login</a>
                    <a class="nav-item nav-link" id="nav-signup-tab" data-toggle="tab" href="#nav-signup" role="tab" aria-controls="nav-signup" aria-selected="false">SignUp</a>
                </div>
            </nav>
                <div class="tab-content container-fluid" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                        <form action="/user/login">
                            @csrf
                            <label for="">Correo</label>
                            <input type="mail" name="" id="" class="form-control">
                            <label for="">Contraseña</label>
                            <input type="password" name="" id="" class="form-control">
                            <button type="submit" class="btn btn-login">
                                Ingresar   
                            </button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
                        <form action="/user/register">
                            @csrf
                            <label for="">Nombre</label>
                            <input type="text" name="" id="" class="form-control">
                            <label for="">Correo</label>
                            <input type="mail" name="" id="" class="form-control">
                            <label for="">Contraseña</label>
                            <input type="password" name="" id="" class="form-control">
                            <label for="">Confirmar contraseña</label>
                            <input type="password" name="" id="" class="form-control">
                            <label for="">Telefono (opcional)</label>
                            <input type="tel" name="" id="" class="form-control">
                            <button type="submit" class="btn btn-login">
                                Registrarse 
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop