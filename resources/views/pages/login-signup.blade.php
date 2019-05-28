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
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <label for="">Correo o nombre de usuario</label>
                            <input type="text" name="name" id="email" value="{{old('name')}}" class="form-control" required>
                            
                            @if($errors->has('name'))
                            <br>
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('name') }}
                            </div>
                            @endif

                            <label for="">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" require>

                            @if($errors->has('password'))
                            <br>
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('password') }}
                            </div>
                            @endif

                            <button type="submit" class="btn btn-login">
                                Ingresar   
                            </button>
                            <br>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{route('password.request')}}">
                                    ¿Olvidó su contraseña?
                                </a>
                            @endif
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <label for="">Nombre</label>
                            <input type="text" name="name" id="" class="form-control">
                            <label for="">Apellido</label>
                            <input type="text" name="apellido" id="" class="form-control">
                            <label for="">Nickname</label>
                            <input type="text" name="nickname" id="" class="form-control">
                            <label for="">Correo</label>
                            <input type="mail" name="email" id="" class="form-control">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" id="" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            <label for="">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" id="" class="form-control">
                            <label for="">Telefono (opcional)</label>
                            <input type="tel" name="telefono" id="" class="form-control">
                            <button type="submit" class="btn btn-login">
                                Registrarse 
                            </button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop