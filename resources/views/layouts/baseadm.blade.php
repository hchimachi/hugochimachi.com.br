<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="{{asset('src/img/7.png')}}" type="image/x-icon">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('src/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('src/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('src/css/bootstrap5.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('src/css/style.css')}} "rel="stylesheet">
    <link href="{{asset('src/css/app.css')}}"rel="stylesheet">
  
    @if(isset($texto))
    @include('components.tinymce-config')
    @endif
  
    
</head>
<body>

        @yield('content')
  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('src/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('src/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('src/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('src/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('src/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('src/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('src/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('src/js/main.js')}}"></script>
             
    <script src="{{asset('src/js/app.js')}}"></script>
    
    

</body>
</html>
