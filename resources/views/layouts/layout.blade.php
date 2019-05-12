<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Pawtroller - @yield("page-title")</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{asset('img/icon.ico')}}" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/mainStyle.css') }}">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class=" container-fluid navbar navbar-expand-lg navbar-light bg-light position-fixed  floating" id="main-nav">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                <div class="navbar-nav">
                <a class="nav-item nav-link" href="/">Home</a>
                <a class="nav-item nav-link" href="/lostpets">Find</a>
                <a class="nav-item nav-link" href="/forum">Forum</a>
                @if(Auth()->check())
                <a class="nav-item nav-link" href="/profile/{{Auth::user()->id}}">
                    <img src="" alt="" width="15px" height="15px">
                    {{Auth::user()->name}}
                </a>
                @else
                <a class="nav-item nav-link" href="/sign">Login / Register</a>
                @endif
                </div>
            </div>
        </nav>
        @yield('content')
        <hr>
        <footer class="container-fluid position-absolute" id="page-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <h3>Disclaimer</h3>
                    <p>Este sitio fue creado con Bootstrap, Laravel, Jquery y muchas de las ganas que me faltaron en todo el semestre. 
                    Todo el contenido de terceros pertenece a sus respectivos autores   
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="/forum" target="_blank" rel="noopener noreferrer"><h3>Visita el foro</h3></a>
                    <p>Aquí podrás encontrar tips y podrás ayudar a otros usuarios con temas relevantes 
                    sobre el cuidado de tu mascota y todo lo relacionado a ella.
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="/lostPets" target="_blank" rel="noopener noreferrer"><h3>Busca mascotas</h3></a>
                    <p> En esta sección podrás encontrar las mascotas que se han perdido recientemente y así poder ayudar 
                        a otro miembro de la comunidad a encontrar a su amigo.
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="/myProfile" target="_blank" rel="noopener noreferrer"><h3>Mi perfil</h3></a>
                    <p>Descubre tu perfil de usuario o crea uno para poder participar en las discusiones del foro así como 
                    también para poder contactar con otros usuarios y publicar sobre tus mascotas.
                    </p>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2018 Copyright:
                <a href="https://github.com/EduardoMataNavarro">Eduardo I. Mata Navarro</a>
            </div>
        </footer>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>