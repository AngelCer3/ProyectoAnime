@extends('plantilla')


@section('contenido')
<div class="container mt-1 mb-4">
	<div class="row" style="background: rgb(0,0,0,0.5);">
		<div class="col-md-12 mt-2">
			<div class="fondo rounded" style="background: url('../images/portada/{{$info_anime->id_anime}}/portada.jpg?v={{$info_anime->id_anime}}'); height: 45vh; background-position: center;
			background-size: cover;">
				<div class="container-fluid fon2 portada-titulo">
					<div class="container d-flex flex-column justify-content-center h-100 text-white text-center">
						<div class="row align">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<h1>{{$info_anime->titulo}}</h1>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row rounded py-2 text-white" style="background-color: rgb(0,0,0,0.5);">
		<div class="col-md-4">
			<div class="rounded shadow mb-3" style="background-color: rgb(0,0,0,0.5);">
                <img class="img img-fluid rounded mx-auto d-block" src="{{asset('images/portada/'.$info_anime->id_anime.'/perfil.jpg') }}">			
				<hr class="bg-primary shadow">
				<b><p class="h4 text-center text-white">{{$info_anime->titulo}}</p></b>
				<br>
			</div>
			@if($info_anime->estado=='En emision')
			<span class="btn btn-block btn-blue py-3 mt-2">
				<i class="far fa-play-circle"></i> <b>{{$info_anime->estado}}</b>
			</span>	
			@elseif($info_anime->estado=='Finalizado')
			<span class="btn btn-block btn-red py-3 mt-2">
				<i class="far fa-stop-circle fa-1x"></i> <b>{{$info_anime->estado}}</b>
			</span>	
			@else
			<span class="btn btn-block btn-purple py-3 mt-2">
				<i class="far fa-pause-circle"></i> <b>{{$info_anime->estado}}</b>
			</span>	
			@endif
			@auth
				@if($fav == 1)
				<a href="{{route('eliminar.favorito',$info_anime->id_anime)}}" class="btn btn-danger btn-block"><i class="fas fa-heart-broken"></i> Eliminar de Favoritos</a>
				@else
				<a href="{{route('insert.favorito',$info_anime->id_anime)}}" class="btn btn-danger btn-block"><i class="far fa-heart"></i> Añadir a Favoritos</a>
				@endif
			@endauth
		</div>
		<div class="col-md-8 ">
			<div class="card shadow py-2" style="background-color: rgb(0,0,0,0.6);">
				<div class="card-header">
					<div class="h5">
						Generos:
					@php 
						$genero=explode(",",$info_anime->genero);
					@endphp
                    @foreach ($genero as $key)
						<a href="#" class="badge badge-pill badge-primary">{{$key}}</a>
					@endforeach
					</div>
				</div>
				<div class="card-body">
					<h3>Sinopsis</h3>
					<hr class="bg-primary">
					<p class="lead text-justify">
                        {{$info_anime->descripcion}}
					</p>					
				</div>
				<div class="card-footer text-right">
					<b>Fecha de emision: </b>{{$info_anime->fecha_estreno}}
				</div>
			</div>
			<hr class="bg-primary">
			<div class="card shadow py-2" style="background-color: rgb(0,0,0,0.6);">
				<div class="card-header">
					<div class="h5">
						Lista de capitulos
						<button class="btn btn-secondary">
							Cantidad: <span class="badge badge-light">{{$info_anime->capitulos}}</span>	
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="" style="overflow:auto; height:550px;">	
					@foreach($info_capitulo as $capitulo)
						<div class="card text-white" style="background-color: rgb(0,0,0,0.4); border: 1px solid rgba(0, 72, 131, 0.5);">
							@if($capitulo->visible == 1)
							<a href="{{route('ver.anime',['anime'=>$info_anime->id_anime,'capitulo'=>$capitulo->numero_cap])}}" class="card-body">
							@else
							<a href="#" class="card-body">
							@endif	
								<div class="row justify-content-center">
									<div class="col-md-4 align-self-center">
										<div class="fondo rounded mx-auto d-block" style="background: url('../../images/portada/{{$info_anime->id_anime}}/perfil.jpg'); height: 140px; width: 205px; background-position: center; background-size: cover;">
											<div class="container-fluid fon2">
												<div class="container d-flex flex-column justify-content-center h-100 text-center">
													
												</div>
											</div>
										</div>										
									</div>
									<div class="col-md-5 text-center align-self-center">
										<p class=""><b>{{$info_anime->titulo}}</b><br>Episodio {{$capitulo->numero_cap}} @if($capitulo->visible == 0) <b class="text-danger">Aun no disponible</b> @endif</p>							
									</div>
									<div class="col-md-3 text-center align-self-center">				
										<i class="fas fa-eye-slash fa-1x" title="NO VISTO"></i>
									</div>
								</div>
							</a>
						</div>							
					@endforeach					
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection