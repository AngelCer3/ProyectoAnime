@extends('plantilla')

@section('contenido')
<div class="container py-4 text-white">
	<div class="row justify-content-around text-center rounded" style="background-color: rgb(0,0,0,0.6);">
		<div class="col-md-12 mt-4">
			<h1 class="text-uppercase">Registro de usuario</h1>
			<hr class="bg-primary">
		</div>
		<div class="col-md-5 align-self-center">
			<p class="anim">Se bienvenid@ a este nuevo mundo</p>
			<img src="{{ asset('images/Logo.webp') }}" width="250px" height="250px">
			<p class="anim">NeoAnimeWorld</p>
		</div>
		<div class="col-md-6 align-self-center">
			<form class="form-grup mb-3 ml-3 mr-3"  method="POST" action="{{route('registro.usuario')}}">
                @csrf
                @error('usuario') 
                <div class="h5 text-center text-danger">
                    <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                </div>
                @enderror
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user-alt"></i></span>
					</div>
					<input type="text" class="form-control input" name="usuario" autofocus id="usuario" required
						placeholder="Usuario" value="{{old('usuario')}}">
				</div>
                @error('password') 
                <div class="h5 text-center text-danger">
                    <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                </div>
                @enderror
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-lock"></i></span>
					</div>
					<input type="password" class="form-control input" name="password" id="password" required
						placeholder="Contraseña">
				</div>
                @error('email') 
                <div class="h5 text-center text-danger">
                    <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                </div>
                @enderror
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span title="E-mail" class="input-group-text"><i class="fas fa-at"></i></span>
					</div>
					<input type="email" class="form-control input" name="email" id="email" required
						placeholder="Correo Electronico" value="{{old('email')}}">
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span title="sexo" class="input-group-text">Sexo</span>
					</div>
					<select name="sexo" id="sexo" class="custom-select input">
						<option value="Indefinido"> Indefinido</option>
						<option value="Masculino"> Masculino</option>
						<option value="Femenino"> Femenino</option>
					</select>
				</div>

				<div class="py-1">
					<button class="btn btn-blue btn-block" type="submit">Registrar</button>
					<a href="login" class="btn btn-link btn-block">¿Ya tienes una cuenta? Inicia sesion</a>
				</div>
			</form>
		</div>
		<div class="col-md-12">
			<br>
		</div>
	</div>
</div>
<div class="">
    <img class="wafle" width="30%" src="{{asset('images/waifu/waifu04.png')}}" alt="">
</div>
@endsection