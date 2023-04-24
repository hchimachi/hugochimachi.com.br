@extends('layouts.baseadm')
@section('content')
       
    @include('home.menu2')
      
    <div class="container mt-0 bg-dark">
        <div class="row">
            <div class="col-lg-8 text-white">
                <!-- Post content-->
                @include('partes.post')
                <!-- Comments section-->
                @if(Auth::check())
                @include('partes.comentario')
                @endif
                
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                @if(isset($busca))
                <!-- Search widget-->
                @include('partes.buscaartigo')
                @endif
                <!-- Categories widget-->
                <div class="card mb-4 mt-5">
                    <div class="card-header">Categorias</div>
                    <div class="card-body">
                        <div class="row">
                                
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                @foreach($cat1 as $categoria)
    <li><a href="{{$categoria['slug']}}">{{$categoria['categoria']}} </a></li>
                                @endforeach      
                                </ul>
                            </div>
                            
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                @foreach($cat2 as $categoria)
    <li><a href="{{$categoria['slug']}}">{{$categoria['categoria']}} </a></li>
                                @endforeach
</ul>
                            </div>
                                
                                
                                
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Outros artigos deste Autor</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                        @foreach($artigos as $artigos)
                        <li><a href="/{{$artigos->artslug}}">{{$artigos->titulo}} (Publicado em {{date('d/m/Y', strtotime($artigo->datapublica))}})</li>
                        
                            </a>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name', '') }} 2023</p></div>
    </footer>
       

 
@endsection