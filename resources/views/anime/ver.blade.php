@extends('plantilla')


@section('contenido')
<div class="container" id="ver">
    <div class="row mt-4 mb-3 justify-content-between rounded" style="background-color: rgb(0,0,0,0.5);">
        <div class="col-md-12 mt-2">
            <h1 class="text-white mt-2">{{$titulo}}</h1>
            <hr class="bg-primary">
        </div>
        <div class="col col-md-9">
            <div class="mt-3 mb-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item rounded" src="{{$info_capitulo->enlace}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media;" allowfullscreen></iframe>
                </div>
            </div>	
        </div>
        <div class="col-md-3 text-white align-self-center text-center">
            <img src="{{asset('images/waifu/waifu08.png')}}" title="wAIFU" class="img img-fluid py-2">
            <hr class="bg-primary">
            <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" scrolldelay="50" behavior="right"><b>ANIME HIKARI TU SITIO FAVORITO DE ANIME Y MANGA</b></marquee>
            <hr class="bg-primary">
            <div class="btn-group mx-auto d-block mt-4" role="group" aria-label="Basic example">
                @if($info_capitulo->numero_cap > 1)
                <a href="{{route('ver.anime',['anime'=>$info_anime->id_anime,'capitulo'=>$info_capitulo->numero_cap-1])}}" type="button" class="btn btn-blue" title="Anterior"><i class="fas fa-angle-left"></i> Anterior</a>
                @endif
                <a href="{{route('info.anime',$info_anime->id_anime)}}" type="button" class="btn btn-blue" title="Lista de Episodios"><i class="fas fa-bars ml-1 mr-1"></i></a>
                <a href="{{route('ver.anime',['anime'=>$info_anime->id_anime,'capitulo'=>$info_capitulo->numero_cap+1])}}" type="button" class="btn btn-blue" title="Siguiente">Siguiente <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection