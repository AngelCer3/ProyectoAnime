@extends('plantilla')

@php 
    if($info_usuario->sexo === "Masculino") {
        $estado1 = 'Selected';
        $estado2 = '';
        $estado3 = '';
    }elseif($info_usuario->sexo === "Femenino"){
        $estado1 = '';
        $estado2 = 'Selected';
        $estado3 = '';
    }else{
        $estado1 = '';
        $estado2 = '';
        $estado3 = 'Selected';
    }
    function validar_check($valor){
        if($valor == 2){
            echo 'checked';
        }
    }
    $cont = 0;
@endphp

@section('contenido')
<div class="row justify-content-around py-4 rounded" style="background-color: rgb(0,0,0,0.6);">
    <div class="col-md-12">
    <div class="card shadow">
        <div class="card-header lead text-white">
            <h3>{{$info_usuario->usuario}} | Actualizacion de Datos</h3>
        </div>
        <div class="card-body">
            <form action="{{route('editar.usuario',$info_usuario->id)}}" method="post">
                <div class="text-right">
                    <a href="{{route('admin.usuario')}}" class="btn btn-blue btn-lg"><i class="fas fa-times-circle"></i> Cancelar</a>
                    <button class="btn btn-purple btn-lg" type="submit"><i class="fas fa-save"></i> Guardar Cambios</button>
                </div>
            
                @csrf
                @method('put')
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="titulo">Nombre usuario</label>
                        <div class="input-group input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="usuario" name="usuario" value="{{$info_usuario->usuario}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="titulo">E-mail</label>
                        <div class="input-group input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="email" name="email" value="{{$info_usuario->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo">Sexo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span title="sexo" class="input-group-text">Sexo</span>
                            </div>
                            <select name="sexo" id="sexo" class="custom-select input">
                                <option {{$estado3}} value="Indefinido"> Indefinido</option>
                                <option {{$estado1}} value="Masculino"> Masculino</option>
                                <option {{$estado2}} value="Femenino"> Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Rol</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-cog"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control form-control-lg input" name="admin" value="ADMINISTRADOR" disabled placeholder="ADMINISTRADOR">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <label class="py-0" for="admin">Asignado
                                    <input type="checkbox" name="rol" {{validar_check($info_usuario->rol)}} id="admin" value="2">
                                </span>                                    
                            </div>
                        </div>  
                    </div>
                </div>	 

            </form>
        </div>
    </div>
        <div class="card-footer lead text-muted text-right">
            NeoAnimeWorld
        </div>
    </div>
</div>
@endsection