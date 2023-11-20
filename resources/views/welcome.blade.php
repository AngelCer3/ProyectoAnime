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
            <div class="col-md-3 mt-4">
                <nav class="navbar navbar-lg navbar-light  scrorev-nav-control" style="background-color: rgb(0,0,0,0.5)";>
                    <div class="container text-center">
                    
                        <div class="navbar-brand text-uppercase" style="color: #FFF;">Animes Destacados<hr class="bg-primary"></div>		
                        <div id="desplegable"></div>
                        <div class="collapse navbar-collapse " id="navbarNav2">
                            <ul class="navbar-nav mr-auto menu2">
                            @foreach($lista_anime as $anime)
                                <li class="nav-item">                 
                                    <a href="{{route('info.anime',$anime->id_anime)}}" class="btn btn-dark btn-block">{{$anime->titulo}}</a>				
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-9 mt-3 mb-5">
                <h1>Animes Recientes</h1>
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
@endsection