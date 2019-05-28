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
                            <span class="h5">Datos de la mascota</span>
                            @if(Auth::check() && ($ownerData->id == Auth::id()))
                                @if($mascotaInfo->id_status == 1)
                                <button class="btn btn-danger float-right" id="btn-report-perdido" _msct-id="{{ $mascotaInfo->id_mascota }}" data-toggle="modal" data-target="#report-lost-pet">
                                    <i class="fas fa-paw"></i>
                                    <span>Reportar como perdido</span>
                                </button>
                                @else
                                @if ($mascotaInfo->id_status == 2)
                                <button class="btn btn-success float-right" id="btn-report-encontrado" _msct-id="{{ $mascotaInfo->id_mascota }}">
                                    <i class="fas fa-paw"></i>
                                    <span>Reportar como encontrado</span>
                                </button>
                                @endif
                                @endif
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <h6><strong>Nombre: </strong> {{ $mascotaInfo->nombreMascota }} </h6>
                                    <h6><strong>Color: </strong> {{ $mascotaInfo->mascotaColor }} </h6>
                                    <h6><strong>Raza: </strong> {{ $mascotaInfo->mascotaRaza }} </h6>
                                    <h6><strong>Estatus: </strong> <i class="fas fa-paw" id="paw-status-icon"></i> <span id="pet-status-container"> {{ $mascotaInfo->status }} </span></h6>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                @if(Auth::check() && ($ownerData->id == Auth::id()))
                                    <span class="h5">Código QR:</span> 
                                    <br>
                                    <div id="qrCode"></div>
                                @endif
                                </div>
                            </div>
                            <br>
                            <h5>Datos del dueño</h5>
                            <hr>
                            <div class="row">
                                
                            </div>
                            <h6><strong>Nombre: </strong>
                                <a href="/profile/{{ $ownerData->id }}" target="_blank" rel="noopener noreferrer"> {{ $ownerData->nickname }} </a>
                            </h6>
                            <h6><strong>Telefono: </strong> {{ $ownerData->telefono }} </h6>
                            <hr>
                            <!-- <h3>Pregunta al dueño</h3>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-6">
                                @if(Auth::check())
                                    <form action="/commentpet" method="post">
                                        @csrf
                                        <input type="hidden" name="id_mascota" value="{{ $mascotaInfo->id }}">
                                        <textarea name="comment" id="pet-comment-box" class="form-control" cols="10" rows="3"></textarea>
                                        <button type="submit" class="btn btn-login">
                                            Comentar
                                        </button>
                                    </form>
                                @else 
                                <div class="w-100">
                                    <span class="h3">Ingrese para preguntar</span>
                                </div>
                                <hr>
                                @endif
                                </div>
                            </div> -->
                            <div class="row">
                                <!-- <div class="col-sm-12 col-md-10 col-lg-8">
                                    <span class="h5"><a href="/profile/" target="_blank">Tito </a></span>
                                    -
                                    <span class="h6">Fecha</span>
                                    >
                                    <span>
                                        Qué bonito amigo, qué raza es?
                                    </span>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10 col-lg-8 offset-md-2 offset-lg-2">
                                            <span class="h5"><a href="/profile/" target="_blank" rel="noopener noreferrer">Dueño </a></span>
                                            -
                                            <span class="h6">Fecha</span>
                                            >
                                            <span>Inbox</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <hr>
                        </div>
                        <div class="tab-pane fade" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">
                            <br>
                            <span class="h5">Galeria de fotos</span>
                            @if(Auth::check() && ($ownerData->id == Auth::id()))
                            <button class="btn btn-info float-right add-pet-content add-photo">
                                <i class="fas fa-paw"></i>
                                <span>Agregar foto</span>
                            </button>
                            @endif
                            <hr>
                            <div class="row" id="pet-photo-container">
                            @if($mascotaFotos)
                                @foreach($mascotaFotos as $foto)
                                <div class="col-xs-6 col-md-4 col-lg-3 pet-multimedia">
                                    <img src="{{ $foto->path }}" class="img-fluid pet-gallery-img" alt="Imagen de mascota">
                                </div>
                                @endforeach
                            @else 
                                <div class="w-100"><span class="h6">Este amigo no tiene imagenes todavia</span></div>
                            @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                            <br>
                            <span class="h5">Galeria de videos</span>
                            @if(Auth::check() && ($ownerData->id == Auth::id()))
                            <button class="btn btn-info float-right add-pet-content add-video">
                                <i class="fas fa-paw"></i>
                                <span>Agregar video</span>
                            </button>
                            @endif
                            <div class="row" id="pet-video-container">
                            @if($mascotaVideos)
                                @foreach($mascotaVideos as $video)
                                <div class="col-sm-12 col-md-6 col-lg-4 pet-multimedia">
                                    <video class="w-100" controls>
                                        <source src="{{ $video->path }}" type="video/mp4">
                                    </video>
                                </div>
                                @endforeach
                            @else 
                                <div class="w-100"><span class="h6">Este amigo no tiene videos todavia</span></div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="file" name="petmedia" id="input-pet-media" _msct-id="{{ $mascotaInfo->id_mascota }}" accept="*" hidden>
    @if(Auth::check())
    <script src="{{asset('js/qrcode.js')}}"></script>
    <script type="text/javascript">
        new QRCode(document.getElementById("qrCode"), window.location.href);
    </script>
    @endif
    @if(Auth::check() && ($ownerData->id == Auth::id()))
    <div class="modal fade" id="report-lost-pet" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reportar mascota perdida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/registerperdido" method="post">
                    <div class="modal-body">
                            @csrf
                            <label for="edit-post-title">Lugar:</label>
                            <input type="text" name="lugar" id="edit-post-title" class="form-control">
                            <label for="edit-post-categoria">Informacion adicional</label>
                            <textarea type="text" name="info" id="edit-post-texto" class="form-control"></textarea>
                            <input type="hidden" name="id_mascota" value="{{ $mascotaInfo->id_mascota }}">
                            <input type="hidden" name="id_status" value="2">
                    </div>
                    <div class="modal-footer">
                        <button type="clear" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection
