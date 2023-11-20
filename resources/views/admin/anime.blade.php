@extends('plantilla')

@section('contenido')
<div class="row justify-content-around py-4 rounded" style="background-color: rgb(0,0,0,0.6);">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header lead text-white">
                <h3>Animes Registrados</h3>
            </div>
            <div class="card-body">
                <div class="text-right">
                    <a href="{{route('panel.admin')}}" class="btn btn-blue">Volver al Panel</a>
                    <a href="{{route('agregar.anime')}}" class="btn btn-purple"><i class="fas fa-plus"></i> Añadir</a>
                </div>
                <div class="">
                    <table class="table table-sm table-responsive-lg aling mt-3 text-white">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Generos</th>
                                <th>Descripcion</th>
                                <th>Fecha Registro</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
	                    </thead>    
                        @foreach($lista_anime as $anime)
                        <tr class="text-center">
                            <td>{{$anime->id_anime}}</td>
                            <td>{{$anime->titulo}}</td>
                            <td><div class="text-sus">{{$anime->genero}}</div></td>
                            <td><div class="text-sus">{{$anime->descripcion}}</div></td>
                            <td>{{$anime->fecha_registro}}</td>
                            <td>
                                <a href="{{route('prev.anime',$anime->id_anime)}}" target="_blank" class="btn btn-blue" title="editar"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>
                                <a href="{{route('anime.pre',$anime->id_anime)}}" class="btn btn-purple" title="editar"><i class="fas fa-edit"></i></a>
                            </td>		
                            <td>
                                <a href="{{route('eliminar.anime',$anime->id_anime)}}" class="btn btn-red" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></a>
                            </span>
                            </td>
                        </tr>  
                        @endforeach 
                    </table>             			
                </div>
                <div class="pagination pagination-md justify-content-center">
                    {{$lista_anime->links()}}
                </div>
            </div>
            <div class="card-footer lead text-muted text-right">
                NeoAnimeWorld
            </div>
        </div>
    </div>
</div>
@endsection