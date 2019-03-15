@extends('layouts.layout')

@section('page-title', 'Post')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/forum">Foro</a></li>
                    <li class="breadcrumb-item"><a href="/forum">Mascotas</a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </nav>
            <br>
            <div class="row" id="original-post-container">
                <div class="d-none d-sm-block col-sm-2">
                    <img src="{{asset('img/user-img/user-generic-photo.jpg')}}" class="forum-post-user-img" alt="Avatar img">
                </div>
                <div class="col-xs-8 col-sm-10 col-md-9 col-lg-8">
                    <h4>¿A qué edad le puedo dar croquetas a mi perrito?</h4>
                    <h5>Fulano de tal</h5>
                    <h6><i class="far fa-clock"></i> 3 de enero de 2019 - 2:30pm</h6>
                    <span class="badge badge-success">Cachorros</span>
                    <span class="badge badge-success">Perros</span>
                    <br>
                    <br>
                    <p>
                        Hola, tengo un perrito que Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Nam laboriosam possimus rerum officiis. Praesentium nesciunt aspernatur, 
                        ex doloribus ut id velit delectus quis iusto? Vitae odit laboriosam nihil ipsa repellendus!
                        y quería saber si me podrían ayudar.
                    </p>
                </div>
                <div class="col-10">
                    <button type=button class="btn btn-success">
                        <i class="fas fa-thumbs-up"></i>
                    </button>
                    <span class="text-success">
                        15
                    </span>
                    <button type=button class="btn btn-danger">
                        <i class="fas fa-thumbs-down"></i>
                    </button>
                    <span class="text-danger">
                        5
                    </span>
                </div>
                <div class="col-2">
                    <button class="btn btn-secondary font-weight-light">
                        Reportar
                    </button>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h6>Pubica un comentario</h6>
                        <form action="/comment/add">
                            <textarea name="comment-area" class="form-control" id="post-text-area" disabled>
                            
                            </textarea>
                            <button type="submit" class="btn btn-login">
                                Publicar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid" id="comment-section">
                <!-- Comment -->
                <div class="row" id="original-post-container">
                    <div class="d-none d-sm-block col-md-2 col-lg-1">
                        <a href="/profile" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('img/user-img/user-generic-photo.jpg')}}" class="forum-post-user-img" alt="Avatar img">
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-10 col-md-9 col-lg-8">
                        <h5>Fulano de tal</h5>
                        <h6><i class="far fa-clock"></i> 3 de enero de 2019 - 2:30pm</h6>
                        <p>
                            Hola, los cachorros pueden comer croquetas desde Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Atque expedita officia provident itaque quaerat, in dignissimos laboriosam recusandae, 
                            fuga ea molestias est hic ex temporibus aliquam veritatis neque doloremque unde.
                        </p>
                    </div>
                    <div class="col-10">
                        <button type=button class="btn btn-success">
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                        <span class="text-success">15</span>
                        <button type=button class="btn btn-danger">
                            <i class="fas fa-thumbs-down"></i>
                        </button>
                        <span class="text-danger">1</span>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-secondary font-weight-light">
                            Reportar
                        </button>
                    </div>
                </div>
                <!-- Comment -->
            </div>
        </div>
    </div>
@endsection