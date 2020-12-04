<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Site Favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/ba4be11306.js" crossorigin="anonymous"></script>

        <title>@yield('title')</title>

    </head>
    <body class="bg-light text-dark">

        @include('includes._nav')
        
        <div class="container">
            @include('includes._alerts')
            @yield('content')
        </div>

        <!-- Bootstrap JavaScript -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>

        <!-- Custom JavaScript -->
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        
    </body>
</html>