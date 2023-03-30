<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;" >
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/OT.jpg" high="70" width="70" alt="logoOt">
                </a>                    
                <a class="navbar-brand" href="{{ route('home') }}" >Home</a>
                @if(!Auth::check())
                <a class="navbar-brand" href="{{ route('login') }}" >Entrar</a>
                @endif
                @auth
                <a class="navbar-brand-top" href="{{ route('logout') }}" >Sair</a>
                @endauth            
            </div>
        </nav>

        <div class="container">
            <h1>{{ $title }}</h1>
            
            {{ $slot }}
        </div>
    </body>  
    <nav class="navbar fixed-bottom navbar-light bg-light" style="background-color: #e3f2fd;">
        <a class="navbar navbar-light" href="/">Oliveira Trust &copy; 2023</a>
      </nav>
</html>
