@extends('plantilla')


@section('contenido')
<div class="container mt-1 mb-4">
	<div class="row" style="background: rgb(0,0,0,0.5);">
		<form class="col-md-12 mt-2" action="{{route('img.anime', $info_anime->id_anime)}}" enctype="multipart/form-data" method="POST">
            @csrf
			<div class="fondo rounded" id="img_portada" style="background: url('../../images/portada/{{$info_anime->id_anime}}/portada.jpg'); height: 45vh; background-position: center;
			background-size: cover;">
				<div class="container-fluid fon2 file">
					<div class="container d-flex flex-column justify-content-center h-100 text-center">
						<div class="row align text-center">
							<div class="col-md-12">
                                <div class="">
                                    <h1>{{$info_anime->titulo}}</h1>
                                    <label class="titulo" for="file">
                                        <i class="fas fa-camera fa-2x"></i> Toca para Cargar foto de portada
                                    </label>
                                    <input class="btn_foto" type="file" accept="image/jpg,image/jpeg" name="portada" id="portada" title="Portada">
                                </div>
							</div>
                            <div class="col-md-12 mt-3">
                                <button id="salvar" type="submit" class="btn btn-purple btn mx-auto "><i class="fas fa-save"></i> Salvar portada</button>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</form>
        <div class="col-md-12 mt-2">
            @error('portada') 
            <div class="h4 text-center text-danger">
                <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
            </div>
            @enderror
        </div>
	</div>
	<div class="row rounded py-2 text-white" style="background-color: rgb(0,0,0,0.5);">
		<form class="col-md-4" action="{{route('perfil.anime', $info_anime->id_anime)}}" enctype="multipart/form-data" method="POST">
			@csrf
			<button id="salvar_foto" type="submit" class="btn btn-purple btn mx-auto " hidden> Salvar</button>
			<input type="text" name="coordenada" id="coordenada" title="coordenada" value="" hidden>
			@error('perfil') 
            <div class="h4 text-center text-danger">
                <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
            </div>
            @enderror
			<div class="rounded shadow mb-3" style="background-color: rgb(0,0,0,0.5);">
				<div class="fondo rounded mx-auto d-block" id="img_portada" style="background: url('../../images/portada/{{$info_anime->id_anime}}/perfil.jpg'); height: 539px; width: 340px; background-position: center; background-size: cover;">
					<div class="container-fluid fon2 file">
						<div class="container d-flex flex-column justify-content-center h-100 text-center">
							<div class="row align text-center">
								<div class="col-md-12">
									<div class="">
										<h3>{{$info_anime->titulo}}</h3>
										<label class="titulo" for="file">
											<i class="fas fa-camera fa-2x"></i> Toca para Cargar foto de perfil
										</label>
										<input class="btn_foto" type="file" accept="image/jpg,image/jpeg" name="perfil" id="perfil" title="perfil">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<hr class="bg-primary shadow">
				<b><p class="h4 text-center text-white">{{$info_anime->titulo}}</p></b>
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
		</form>
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
							<a href="home" class="card-body">
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
<button id="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false" hidden>Large modal</button>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel">Selecciona un area de recorte</h5>
      </div>
      <div class="modal-body" id="crear" style="overflow-y: scroll; overflow-x: scroll;">        
      </div>
      <div class="modal-footer">
       <button type="button" id="cerrar_modal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="btn_recorte" class="btn btn-blue">Aplicar recorte</button>
      </div>
    </div>
  </div>
</div>
@endsection