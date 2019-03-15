@extends('layouts.layout')

@section('page-title', 'Amigo')

@section('content')
    <div class="container-fluid content-wrapper">
        <div class="container">
            <h3>Amigo</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-2">

                </div>
                <div class="col-xs-12 col-md-10">
                    <ul class="nav nav-tabs" id="pet-tab-control" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="fotos-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Fotos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <br>
                            <h5>Datos de la mascota</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <h6><strong>Nombre: </strong> Amigo peludo</h6>
                                    <h6><strong>Color: </strong> Amarillo fosfo</h6>
                                    <h6><strong>Raza: </strong> Electrico</h6>
                                    <h6><strong>Estatus: </strong> <i class="fas fa-paw text-success"></i> En casa</h6>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    Código QR:
                                    <br>
                                    <div id="qrCode"></div>
                                </div>
                            </div>
                            <br>
                            <h5>Datos del dueño</h5>
                            <hr>
                            <div class="row">
                                
                            </div>
                            <h6><strong>Nombre: </strong><a href="/profile" target="_blank" rel="noopener noreferrer">Francisco5000</a></h6>
                            <h6><strong>Telefono: </strong> 8110231283</h6>
                            <h6><strong>Ciudad: </strong>Santa Catarina, Nuevo León</h6>
                        </div>
                        <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">
                            <br>
                            <h5>Galeria de fotos</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <img src="{{asset('img/pet-img/dog.jpg')}}" class="img-fluid pet-gallery-img" alt="Imagen de mascota">
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <img src="{{asset('img/pet-img/dog.jpg')}}" class="img-fluid pet-gallery-img" alt="Imagen de mascota">
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <img src="{{asset('img/pet-img/dog.jpg')}}" class="img-fluid pet-gallery-img" alt="Imagen de mascota">
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <img src="{{asset('img/pet-img/dog.jpg')}}" class="img-fluid pet-gallery-img" alt="Imagen de mascota">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                            <br>
                            <h5>Galería de videos</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <video class="w-100" controls>
                                        <source src="{{asset('vid/pet-vid/dog.mp4')}}" type="video/mp4">
                                    </video>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <video class="w-100" controls>
                                        <source src="{{asset('vid/pet-vid/dog.mp4')}}" type="video/mp4">
                                    </video>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <video class="w-100" controls>
                                        <source src="{{asset('vid/pet-vid/dog.mp4')}}" type="video/mp4">
                                    </video>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <video class="w-100" controls>
                                        <source src="{{asset('vid/pet-vid/dog.mp4')}}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/qrcode.js')}}"></script>
    <script type="text/javascript">
        new QRCode(document.getElementById("qrCode"), "http://127.0.0.1/pet");
    </script>
@endsection
