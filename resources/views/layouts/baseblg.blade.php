<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('src/img/7.png')}}" type="image/x-icon">
    <title>{{ config('app.name', '') }}</title>

    <!-- Styles -->
     <link rel="stylesheet" href="{{ asset('src/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset('src/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{ asset('src/css/aos.css')}}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('src/css/tooplate-gymso-style.css')}}">
    <link href="{{ asset('src/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-dark" data-spy="scroll" data-target="#navbarNav" data-offset="50">
    <h1 class="navbarnome">Escritório de Advocacia</h1>

        @yield('content')


     <script src="{{ asset('src/js/jquery.min.js') }}"></script>
     <script src="{{ asset('src/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('src/js/aos.js') }}"></script>
     <script src="{{ asset('src/js/smoothscroll.js') }}"></script>
     <script src="{{ asset('src/js/custom.js') }}"></script>

<script src="{{ asset('src/js/app.js') }}" defer></script>
</body>
</html>
