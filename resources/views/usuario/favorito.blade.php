@extends('plantilla')

@php 
    function limitar_texto($cadena,$titulo){
        if(strlen($cadena) >= 160){
            $cadena = substr($cadena, 0 , (165-strlen($titulo))) .'...';
        }
        return $cadena;
    }
@endphp

@section('contenido')
    <div class="container py-4 text-white">
        <div class="row justify-content-between mt-3 rounded" style="background-color: rgb(0,0,0,0.6);">
            <div class="col-md-3 mt-3 mb-5">
                <div class="rounded shadow py-1 " style="background-color: rgb(0,0,0,0.5);">
                    <img class="img-thumbnail rounded-circle" src="{{asset('images/usuario/'.Auth::user()->id.'/usuario.jpg') }}">
                    <hr class="bg-primary shadow">
                    <b><p class="text-uppercase text-center text-white">{{Auth::user()->usuario}}</p></b>
                </div>	
            </div>
            <div class="col-md-9 mt-3 mb-5">
                <h1>Animes Favoritos</h1>
                <hr class="bg-primary">
                <div class="row">
                    @foreach($lista_anime as $anime)
                    <div class="col-md-3 py-2">
                        <div class="acercamiento-img contenerdor-img hidden">
                            <img src="{{asset('images/portada/'.$anime->id_anime.'/perfil.jpg') }}" class="img img-fluid rounded border border-primary" alt="{{$anime->titulo}}" title="{{$anime->titulo}}">
                            <a href="{{route('info.anime',$anime->id_anime)}}" class="texto-emergente">
                                <h4><b>{{$anime->titulo}}</b></h4>
                                <p class="text-justify">{{limitar_texto($anime->descripcion, $anime->titulo)}}</p>
                                <!-- <i class="fas fa-play-circle fa-2x text-primary"></i> -->
                            </a>	
                        </div>	
                    </div>
                    @endforeach	 
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <img class="wafle" width="20%" src="{{asset('images/waifu/waifu03.png')}}" alt="">
    </div>
@endsection