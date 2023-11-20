<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jcrop.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jcrop.js')}}"></script>
    
    <title>404</title>
</head>
<body>
    @include('loader')
    <div class="container mt-1">
        <div class="row justify-content-around rounded" style="background-color: rgb(0,0,0,0.5);">
            <div class="col-md-9 text-center">
                <h1 class="display-4 text-white">404!</h1>
                <img class="img-fluid mx-auto d-block" src="{{asset('images/waifu/waifu06.png')}}" alt="">
                <h1 class="text-white">El capitulo que deseas ver aun no esta disponible!</h1>
            </div>
        </div> 
    </div> 
    <script type="text/javascript" src="{{ asset('js/main.js')}}"></script>
</body>
</html>