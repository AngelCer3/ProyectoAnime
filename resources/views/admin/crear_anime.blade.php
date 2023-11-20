@extends('plantilla')

@section('contenido')
<div class="row justify-content-around py-4 rounded" style="background-color: rgb(0,0,0,0.6);">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header lead text-white">
                <h3>Registrar Nuevo Anime</h3>
            </div>
            <div class="card-body">
                <form action="{{route('insert.anime')}}" method="post">
                    <div class="text-right">
                        <a href="{{route('animes.admin')}}" class="btn btn-blue btn-lg"><i class="fas fa-times-circle"></i> Cancelar</a>
                        <button class="btn btn-purple btn-lg" type="submit"><i class="fas fa-save"></i> Guardar Anime</button>
                    </div>
                
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-7">
                            @error('titulo') 
                            <p class="text-danger">
                                <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                            </p>
                            @enderror
                            <label for="titulo">Titulo</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="titulo" name="titulo" value="{{old('titulo')}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="tipo">Tipo</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                </div>
                                <select name="tipo" id="tipo" class="custom-select input">				
                                    <option value="Anime">Anime</option>
                                    <option value="OVA">OVA</option>
                                    <option value="Pelicula">Peliula</option>
                                </select>
                            </div>
                        </div>
                    </div>	        
                    @error('genero') 
                    <p class="text-danger">
                        <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                    </p>
                    @enderror                    
                    <label for="genero">Generos</label>
                    <div class="input-group input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="genero" name="genero" value="{{old('genero')}}">
                    </div>
                    @error('descripcion') 
                    <p class="text-danger">
                        <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                    </p>
                    @enderror
                    <label for="descripcion mt-2">Sinopsis</label>
                    <div class="form_description d-flex flex-wrap">
                        <textarea maxlength="1000" onkeyup="if (this.value.length == this.getAttribute('maxlength')" name="descripcion" id="descripcion" placeholder="Descripcion">{{old('descripcion')}}</textarea>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            @error('fecha_estreno') 
                            <p class="text-danger">
                                <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                            </p>
                            @enderror
                            <label for="fecha">Fecha de estreno</label>
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control input fecha-input" id="fecha" name="fecha_estreno" min="1907-09-17" max="" value="{{old('fecha_estreno')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="crea_estado" class="mx-auto">Estado</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tv"></i></span>
                                </div>
                                <select name="estado" id="estado" class="custom-select input">				
                                    <option value="En emision">En emision</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="En pausa">En pausa</option>
                                </select>
                            </div>							
                        </div>
                        <div class="col-md-4">
                            @error('capitulos') 
                            <p class="text-danger">
                                <i class="fas fa-exclamation-circle mr-1 text-warning"></i> {{$message}}
                            </p>
                            @enderror
                            <label for="capitulo">Cantidad de capitulos</label>
                            <div class="input-group input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                </div>
                                <input type="number" class="form-control input" id="capitulo" name="capitulos" value="{{old('capitulos')}}">
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
@endsection