<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/Logo.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jcrop.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jcrop.js')}}"></script>
    
    <title>{{$titulo}}</title>
</head>
<body class="{{$clase}}">
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <main class="main">
            <section class="section my-0 py-0">
                @include('componente/navbar')
                <div class="container mt-1">
                    @yield('contenido')   
                </div> 
            </section>
        </main>
        @include('componente/footer') 
    </div>     
    <script type="text/javascript" src="{{ asset('js/main.js')}}"></script>
</body>
</html>