@extends('plantilla')

@section('contenido')
<div class="row justify-content-around py-4 rounded" style="background-color: rgb(0,0,0,0.6);">
    <div class="col-md-12">
        <div class="card shadow rounded-5">
            <div class="card-header lead text-white">
                <h3>Usuarios Registrados</h3>
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
                                <th>Usuario</th>
                                <th>E-mail</th>
                                <th>Sexo</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Editar</th>
                            </tr>
	                    </thead>    
                        @foreach($lista_usuario as $usuario)
                        <tr class="text-center">
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->usuario}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->sexo}}</td>
                            <td>
                                @if($usuario->rol == "1")
                                    <span class="text-danger"><i class="fas fa-dragon"></i> Root</span>
                                @elseif($usuario->rol == "2")
                                    <span class="text-primary"><i class="fas fa-user-cog"></i> Administrador</span>
                                @else
                                    <span class="text-warning"><i class="fas fa-user-check"></i> Usuario</span>
                                @endif
                            </td>
                            <td>
                                @if($usuario->estado == "conectado")
                                    <span class="btn btn-green"><i class="fas fa-user-alt"></i></span>
                                @else
                                    <span class="btn btn-red"><i class="fas fa-user-alt-slash"></i></span>
                                @endif
                            </td>
                            <td>
                                @if($usuario->rol != "1")
                                <a href="{{route('usuario.pre',$usuario->id)}}" class="btn btn-purple" title="editar"><i class="fas fa-edit"></i></a>
                                @else
                                <span class="btn btn-purple" title="No editable"><i class="fas fa-lock"></i></span>
                                @endif
                            </td>	
                        </tr>  
                        @endforeach 
                    </table>             			
                </div>
                <div class="pagination pagination-md justify-content-center">
                    {{$lista_usuario->links()}}
                </div>
            </div>
            <div class="card-footer lead text-muted text-right">
                NeoAnimeWorld
            </div>
        </div>
    </div>
</div>
@endsection