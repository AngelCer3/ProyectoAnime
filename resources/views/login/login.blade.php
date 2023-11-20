@extends('plantilla')
@section('contenido')
<div class="row justify-content-around text-center text-white mt-3">
    <div class="col-md-5 py-2 rounded" style="background-color: rgb(0,0,0,0.6);">
        <h1 class="mt-3 text-uppercase">Login</h1>
        <hr class="bg-primary">
        <img class="mb-2" src="{{ asset('images/Logo.webp') }}"  width="50%">
        <form method="POST" class="form-grup mb-3 ml-3 mr-3" action="{{route('sesion.login')}}">
            @csrf 
            @error('usuario')
            <div class="h5 text-center text-danger" >
                <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
            </div>
            @enderror
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                </div>
                <input type="text" class="form-control input" name="usuario" id="username" required autofocus placeholder="Usuario" value="{{old('username')}}">
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
                <input type="password" class="form-control input" name="password" id="password" required  placeholder="Contraseña">
            </div>
            
            <div class="py-1">
                <button type="submit" class="btn btn-blue btn-block ">Iniciar Sesion</button>
                <a href="registro" class="btn btn-blue btn-block ">Registrarse</a>
            </div>
        </form>
    </div>
</div>
@error('usuario') 
<div class="">
        <img class="wafle" width="30%" src="{{asset('images/waifu/waifu05.png')}}" alt="">
    </div>
@enderror
@error('password') 
<div class="">
        <img class="wafle" width="30%" src="{{asset('images/waifu/waifu05.png')}}" alt="">
    </div>
@enderror
@endsection