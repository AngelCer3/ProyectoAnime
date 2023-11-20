@extends('plantilla')

@php 
    if($info_anime->estado === "En emision") {
        $estado1 = 'Selected';
        $estado2 = '';
        $estado3 = '';
    }elseif($info_anime->estado === "Finalizado"){
        $estado1 = '';
        $estado2 = 'Selected';
        $estado3 = '';
    }else{
        $estado1 = '';
        $estado2 = '';
        $estado3 = 'Selected';
    }

    if($info_anime->tipo === "Anime") {
        $tipo1 = 'Selected';
        $tipo2 = '';
        $tipo3 = '';
    }elseif($info_anime->tipo === "OVA"){
        $tipo1 = '';
        $tipo2 = 'Selected';
        $tipo3 = '';
    }else{
        $tipo1 = '';
        $tipo2 = '';
        $tipo3 = 'Selected';
    }

    function validar_check($valor){
        if($valor == 1){
            echo 'checked';
        }
    }
    $cont = 0;
@endphp

@section('contenido')
<div class="row justify-content-around py-4 rounded" style="background-color: rgb(0,0,0,0.6);">
    <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Informacion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Capitulos</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card shadow">
                    <div class="card-header lead text-white">
                        <h3>{{$info_anime->titulo}} | Actualizacion de Datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('editar.anime', $info_anime->id_anime)}}" method="post">
                            <div class="text-right">
                                <a href="{{route('animes.admin')}}" class="btn btn-blue btn-lg"><i class="fas fa-times-circle"></i> Cancelar</a>
                                <button class="btn btn-purple btn-lg" type="submit"><i class="fas fa-save"></i> Guardar Cambios</button>
                                <a href="{{route('prev.anime',$info_anime->id_anime)}}" class="btn btn-red btn-lg" title="editar"><i class="fas fa-eye"></i> Visualizar</a>
                            </div>
                        
                            @csrf
                            @method('put')
                            <div class="row mb-2">
                                <div class="col-md-7">
                                    <input type="text" hidden id="id_anime" name="id_anime" value="{{$info_anime->id_anime}}">
                                    <label for="titulo">Titulo</label>
                                    <div class="input-group input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control input" id="titulo" name="titulo" value="{{$info_anime->titulo}}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="tipo">Tipo</label>
                                    <div class="input-group input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <select name="tipo" id="tipo" class="custom-select input" value="{{$info_anime->tipo}}">				
                                            <option {{$tipo1}} value="Anime">Anime</option>
                                            <option {{$tipo2}} value="OVA">OVA</option>
                                            <option {{$tipo3}} value="Pelicula">Peliula</option>
                                        </select>
                                    </div>
                                </div>
                            </div>	        
                            
                            <label for="genero">Generos</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="genero" name="genero" value="{{$info_anime->genero}}">
                            </div>

                            <label for="descripcion mt-2">Sinopsis</label>
                            <div class="form_description d-flex flex-wrap">
                                <textarea maxlength="1000" onkeyup="if (this.value.length == this.getAttribute('maxlength')" name="descripcion" id="descripcion" placeholder="Descripcion">{{$info_anime->descripcion}}</textarea>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="fecha">Fecha de estreno</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control input fecha-input" id="fecha" name="fecha_estreno" value="{{$info_anime->fecha_estreno}}" min="1907-09-17" max="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="crea_estado" class="mx-auto">Estado</label>
                                    <div class="input-group input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tv"></i></span>
                                        </div>
                                        <select name="estado" id="estado" class="custom-select input">				
                                            <option {{$estado1}} value="En emision">En emision</option>
                                            <option {{$estado2}} value="Finalizado">Finalizado</option>
                                            <option {{$estado3}} value="En pausa">En pausa</option>
                                        </select>
                                    </div>							
                                </div>
                                <div class="col-md-4">
                                    <label for="capitulo">Cantidad de capitulos</label>
                                    <div class="input-group input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                        </div>
                                        <input type="number" class="form-control input" id="capitulo" name="capitulos" value="{{$info_anime->capitulos}}">
                                    </div>							
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer lead text-muted text-right">
                        NeoAnimeWorld
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card shadow">
                    <div class="card-header lead text-white">
                        <h3>{{$info_anime->titulo}} | Cargar capitulos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('enlace.anime', $info_anime->id_anime)}}" method="post">
                            <div class="text-right">
                                <a href="{{route('animes.admin')}}" class="btn btn-blue btn-lg"><i class="fas fa-times-circle"></i> Volver al panel</a>
                                <button class="btn btn-purple btn-lg" type="submit"><i class="fas fa-save"></i> Guardar Cambios</button>
                            </div>                        
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <input type="text" name="id_anime" value="{{$info_anime->id_anime}}" hidden> -->
                                    <input type="text" name="capitulos" value="{{$info_anime->capitulos}}" hidden>
                                    @foreach($info_capitulo as $capitulo)
                                    <input type="text" name="id_enlace{{$cont}}" value="{{$capitulo->id_capitulo}}" hidden>
                                    <label for="">Capitulo {{$capitulo->numero_cap}}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-link"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg input" name="enlace{{$cont}}" value="{{$capitulo->enlace}}" placeholder="Ingresa el link del capitulo">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <label class="py-0" for="visible{{$cont}}">Visible
                                                <input type="checkbox" name="visible{{$cont}}" {{validar_check($capitulo->visible)}} id="visible{{$cont}}" value="1">
                                            </span>                                    
                                        </div>
                                    </div>  
                                    @php $cont++; @endphp
                                    @endforeach                   
                                    <div class="pagination pagination-md justify-content-center">
                                        {{$info_capitulo->links()}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer lead text-muted text-right">
                        NeoAnimeWorld
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection