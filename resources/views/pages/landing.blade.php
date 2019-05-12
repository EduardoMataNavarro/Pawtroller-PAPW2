@extends("layouts.layout")

@section("page-title", "Home")

@section("content")
    <div class="w-100 full-vh" id="landing-front-content">
        <img src="{{asset('img/cat-and-dog-landing.jpg')}}" id="landing-image" class="img-fluid-c" alt="" srcset="">
    </div>
    <div class="w-100 full-vh">
        <div class="container content-heading" id="lost-friend-head">
            <h3 class="display-4">Perdidos</h3>
            <h3 class="display-4">recientemente</h3>
        </div>
        <div class="container-fluid landing-content">
            <div class="row">
            @if ($lostPets)
                @foreach($lostPets as $lostPet)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card recently-lost-card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
            @if ($lostPets)
                @foreach($latestPosts as $post)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card recently-posted-card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div> 
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
@endsection