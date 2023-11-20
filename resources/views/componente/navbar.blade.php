<nav class="navbar navbar-expand-lg navbar-light  scrorev-nav-control menu" style="background-color: rgb(0,0,0,0.8)" ;>
    <div class="container text-center">
        <a class="navbar-brand text-white" href="/"><img loading="lazy" src="{{asset('images/Logo.webp') }}" width="30px"
                height="30px">NeoAnimeWorld</a>
        <!-- Boton de hamburgesa al cambiar el tamaño de pantalla -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <!-- Opciones de barra de navegacion -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-dark" href="{{route('home')}}"><i class="fs-5 bi bi-house"></i></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="{{route('home')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="{{route('directorio.anime')}}">Directorio Anime</a>
                </li>
                <li class="nav-item dropdown mx-auto d-block">
                    <!-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control input dropdown-toggle" name="buscador" id="buscador"
                        placeholder="Buscar" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="bus-drown"
                        style="background-color: rgb(0,0,0,0.4)">
                        <div id="resultado_busqueda"></div>
                    </div> -->
                </li>
            </ul>
            <ul class="navbar-nav mx-auto"></ul>
            <ul class="navbar-nav mx-auto"></ul> 
            <ul class="navbar-nav mx-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="btn btn-dark dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img loading="lazy" class="rounded-circle mr-1" width="25px" height="25px" src="{{asset('images/usuario/'.Auth::user()->id.'/usuario.jpg') }}"> {{Auth::user()->usuario}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1" style="background-color: rgb(0,0,0,0.4)">
                        <a href="{{route('cuenta')}}" class="dropdown-item btn"><i class="fas fa-user-ninja mr-1"></i> Mi Cuenta</a>
                        <a href="{{route('editar.cuenta')}}" class="dropdown-item btn"><i class="fas fa-user-edit"></i> Editar Información</a>
                        @if(Auth::user()->rol == 1)
                        <a href="{{route('panel.admin')}}" class="dropdown-item btn"><i class="fas fa-user-cog"></i> Panel de Admin</a>
                        @endif
                        <hr>
                        <a href="{{route('logout.login')}}" type="button" class="dropdown-item btn btn-red text-white" id="btnCerrarSesion"><i class="fas fa-power-off mr-2"></i>Cerrar Sesion</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-dark" href="{{route('sesion.login')}}"><i class="fas fa-user"></i> Iniciar Sesion</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
