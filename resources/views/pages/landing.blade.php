@extends("layouts.layout")

@section("page-title", "Home")

@section("content")
    <div class="w-100 full-vh" id="landing-front-content">
        <img src="{{asset('img/cat-and-dog-landing.jpg')}}" id="landing-image-lg" class="d-none d-lg-block img-fluid-c landing-image">
        <img src="{{asset('img/pug-md-device.jpg')}}" id="landing-image-md" class="d-lg-none d-md-block img-fluid-c landing-image">
       
    </div>
    <div class="w-100 full-vh">
        <div class="container content-heading" id="lost-friend-head">
            <h3 class="display-4">Perdidos</h3>
            <h3 class="display-4">recientemente</h3>
        </div>
        <div class="container-fluid landing-content">
            <div class="row justify-content-center">
            @if (!empty($lostPets))
                @foreach($lostPets as $lostPet)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card recently-lost-card">
                        <div class="card-body">
                            <h5 class="card-body"> {{ $lostPet->nombreMascota }} </h5>
                            <p class="card-text"> 
                                {{ $lostPet->lugar }}
                                <br>
                                {{ $lostPet->info_adicional }} 
                            </p>
                            <a href="/pet/{{ $lostPet->id_mascota }}" class="btn btn-login">Ver mascota</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="w-100 full-vh">
        <div class="container content-heading">
            <h3 class="display-4">Posts</h3>
            <h3 class="display-4">recientes</h3>
        </div>
        <div class="container-fluid landing-content">
            <div class="row justify-content-center">
            @if ($latestPosts)
                @foreach($latestPosts as $post)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card recently-posted-card">
                        <div class="card-body">
                            <h4 class="card-title"><a href="/post/{{ $post->id_publicacion }}">{{ $post->titulo }}</a> </h4>
                            <p class="card-text post-display-text"> {{ $post->texto }} </p>
                        </div>
                    </div> 
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
@endsection