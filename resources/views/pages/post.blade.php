@extends('layouts.layout')

@section('page-title', 'Post')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/forum">Foro</a></li>
                    <li class="breadcrumb-item"><a href="/forum/category/{{ $postContent->categoria }}"> {{ $postContent->categoria }} </a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </nav>
            <br>
            <div class="row" id="original-post-container">
                {{ $postContent->reportado ? __('<div class="w-100"> <p class="alert alert-warning">La publicacion ha sido reportada</p></div>') : '' }}
                <div class="d-none d-sm-block col-sm-2">
                    <img src="{{asset('img/user-img/user-generic-photo.jpg')}}" class="forum-post-user-img" alt="Avatar img">
                </div>
                <div class="col-xs-8 col-sm-10 col-md-9 col-lg-8">
                    <h4> {{ $postContent->titulo }} </h4>
                    <h5><a href="/profile/{{ $postContent->id }}" target="_blank"> {{ $postContent->nickname }} </a></h5>
                    <h6><i class="far fa-clock"></i> {{ $postContent->created_at }} </h6>
                    <br>
                    <br>
                    <p> {{ $postContent->texto }} </p>
                </div>
                <div class="col-12" style="margin-top: 25px;">
                    @if(Auth()->check())
                    <button type=button class="btn btn-success rate goodRate" _pst-id="{{$postContent->id_publicacion}}">
                        <i class="fas fa-thumbs-up"></i>
                    </button>
                    <span class="text-success" id="goodRatings">
                        {{ $postGoodRating }}
                    </span>
                    <button type=button class="btn btn-danger rate badRate" _pst-id="{{$postContent->id_publicacion}}">
                        <i class="fas fa-thumbs-down"></i>
                    </button>
                    <span class="text-danger" id="badRatings">
                        {{ $postBadRating }}
                    </span>
                    @endif
                    
                    @if(Auth()->check())
                    <button class="btn btn-secondary font-weight-light float-right">
                        Reportar
                    </button>
                    @endif
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        @if(Auth()->check())
                        <h6>Pubica un comentario</h6>
                            <form action="/createcomment" method="post" id="create-comment-form">
                            @csrf
                            <textarea name="comentario" class="form-control" id="post-text-area" maxlength="255"></textarea>
                            <input type="hidden" name="id_publicacion" value="{{ $postContent->id_publicacion }}">
                            <button type="submit" id="submit-comment-btn" class="btn btn-login"> 
                                Publicar
                            </button>
                        </form>
                        @else 
                        <div class="w-100 justify-content-center">
                            <h5>Ingrese para comentar</h5>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid" id="comment-section">
            @if(!empty($postComments))
                @foreach($postComments as $comment)
                <!-- Comment -->
                <div class="row" id="original-post-container">
                    <div class="d-none d-sm-block col-md-2 col-lg-1">
                        <a href="/profile/{{ $comment->userId }}" target="_blank">
                            <img src="{{ $comment->avatarPicPath }}" class="forum-post-user-img" alt="Avatar img">
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-10 col-md-9 col-lg-8">
                        <h5><a href="/profile/{{ $comment->userId }}" target="_blank"> {{ $comment->nickname }} </a></h5>
                        <h6><i class="far fa-clock"></i> {{ $comment->created_at }} </h6>
                        <p> {{ $comment->comentario }} </p>
                    </div>
                    <div class="col-12">
                        @if(Auth()->check())
                        <button class="btn btn-secondary font-weight-light" _cmnt-id="{{ $comment->commentId }}">
                            Reportar
                        </button>
                        @endif
                    </div>
                </div>
                <!-- Comment -->
                @endforeach
            @else 
                <div class="w-100 justify-content-center">
                    <h4>No hay comentarios todavia</h4>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection