@extends('layouts.baseadm')

@section('content')
     
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
       @include('partes.preloader')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('partes.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('partes.navbar')
            <!-- Navbar End -->
            <h1 class="4">Seja bem vindo {{Auth::user()->name}}</h1>   
            @include('partes.erros')
            @if(isset($pagina))
            @include('admin.'.$pagina)
            @endif

            <!-- Footer Start -->
          @include('partes.rodape')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    
 
@endsection