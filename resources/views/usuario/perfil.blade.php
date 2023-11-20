@extends('plantilla')

@php
    if ($info_usuario->sexo === 'Masculino') {
        $estado1 = 'Selected';
        $estado2 = '';
        $estado3 = '';
    } elseif ($info_usuario->sexo === 'Femenino') {
        $estado1 = '';
        $estado2 = 'Selected';
        $estado3 = '';
    } else {
        $estado1 = '';
        $estado2 = '';
        $estado3 = 'Selected';
    }
    function validar_check($valor)
    {
        if ($valor == 2) {
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
                    <h3>{{ $info_usuario->usuario }} | Actualizacion de Datos</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <form class="col-md-4" action="{{ route('perfil.usuario', $info_usuario->id) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <button id="salvar_foto" type="submit" class="btn btn-purple btn mx-auto " hidden>
                                Salvar</button>
                            <input type="text" name="coordenada" id="coordenada" title="coordenada" value=""
                                hidden>
                            @error('usuario')
                                <div class="h4 text-center text-danger">
                                    <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{ $message }}
                                </div>
                            @enderror
                            <div class="rounded shadow py-1 " style="background-color: rgb(0,0,0,0.5);">
                                <!-- <img class="img-thumbnail rounded-circle" src="{{ asset('images/usuario/' . $info_usuario->id . '/usuario.jpg') }}"> -->
                                <div class="fondo rounded-circle mx-auto d-block" id="img_portada"
                                    style="background: url('../../images/usuario/{{ $info_usuario->id }}/usuario.jpg'); height: 300px; width: 300px; background-position: center; background-size: cover;">
                                    <div class="container-fluid fon2 file2">
                                        <div class="container d-flex flex-column justify-content-center h-100 text-center">
                                            <div class="row align text-center">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <label class="titulo" for="file">
                                                            <i class="fas fa-camera fa-2x"></i> Toca para Cargar foto de
                                                            perfil
                                                        </label>
                                                        <input class="btn_foto2" type="file"
                                                            accept="image/jpg,image/jpeg" name="usuario" id="usuario"
                                                            title="perfil">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="bg-primary shadow">
                                <b>
                                    <p class="text-uppercase text-center text-white">{{ Auth::user()->usuario }}</p>
                                </b>
                            </div>
                        </form>
                        <form action="{{ route('editar.miInfo', $info_usuario->id) }}" method="post"
                            class="col-md-6 align-self-center">
                            @csrf
                            @method('put')
                            <label for="titulo">Nombre usuario</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="usuario" name="usuario"
                                    value="{{ $info_usuario->usuario }}">
                            </div>
                            <label for="titulo">E-mail</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="email" name="email"
                                    value="{{ $info_usuario->email }}">
                            </div>
                            @error('password')
                                <p class="text-danger"><i class="fas fa-exclamation-circle me-1 text-warning"></i>
                                    {{ $message }}</p>
                            @enderror
                            <label for="password">Contraseña</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control input" id="password" name="password">

                            </div>
                            <label for="tipo">Sexo</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span title="sexo" class="input-group-text">Sexo</span>
                                </div>
                                <select name="sexo" id="sexo" class="custom-select input">
                                    <option {{ $estado3 }} value="Indefinido"> Indefinido</option>
                                    <option {{ $estado1 }} value="Masculino"> Masculino</option>
                                    <option {{ $estado2 }} value="Femenino"> Femenino</option>
                                </select>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-purple btn-lg" type="submit"><i class="fas fa-save"></i> Guardar
                                    Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer lead text-muted text-right">
                NeoAnimeWorld
            </div>
        </div>
    </div>

    <button id="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
        data-backdrop="static" data-keyboard="false" hidden>Large modal</button>

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Selecciona un area de recorte</h5>
                </div>
                <div class="modal-body" id="crear" style="overflow-y: scroll; overflow-x: scroll;">
                </div>
                <div class="modal-footer">
                    <button type="button" id="cerrar_modal" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn_recorte" class="btn btn-blue">Aplicar recorte</button>
                </div>
            </div>
        </div>
    </div>
@endsection
