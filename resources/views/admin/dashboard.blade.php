@extends('plantilla')
@section('contenido')
	<div class="row py-4 rounded" style="background-color: rgb(0,0,0,0.6);">
		<div class="col-md-12 text-center">
			<h1 class="mb-4 text-white text-uppercase">Panel de Administrador</h1>
			<hr class="bg-primary shadow">
		</div>
		<div class="col-md-3 d-none d-md-block">
			<div class="rounded shadow py-1 " style="background-color: rgb(0,0,0,0.5);">
				<img class="w-100 " src="{{asset('images/Logo.webp') }}">
				<hr class="bg-primary shadow">
				<b><p class="text-uppercase text-center text-white">Administracion NeoAnimeWorld</p></b>
			</div>				
		</div>
		<div class="col-md-9 align-self-start">
			<div class="row">
				<div class="col-md-4">
					<a href="{{route('admin.usuario')}}" class="card text-white mb-3" style="background-color: rgb(0,0,0,0.4); border: 1px solid rgba(0, 72, 131, 0.5);">
						<div class="card-header text-center" style="background-color: rgb(0,0,0,0.7);">
							Usuarios
						</div>
						<div class="card-body text-center">
							<i class="fas fa-user fa-7x mx-auto d-block"></i>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="{{route('animes.admin')}}" class="card text-white mb-3" style="background-color: rgb(0,0,0,0.4); border: 1px solid rgba(0, 72, 131, 0.5);">
						<div class="card-header text-center" style="background-color: rgb(0,0,0,0.7);">
							Anime
						</div>
						<div class="card-body text-center">
							<i class="fas fa-user-ninja fa-7x mx-auto d-block"></i>						
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection