<article>
    <!-- Post header-->
        <header class="mb-4">
        <!-- Post title-->
            <h1 class="fw-bolder mb-1">{{$artigo->titulo}}</h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">Publicado em {{date('d/m/Y', strtotime($artigo->datapublica))}} as {{date('H:i', strtotime($artigo->datapublica))}} por {{$artigo->nomecompleto}}</div>
            <!-- Post categories-->
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$artigo->categoria}}</a>
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$artigo->titulo}}</a>
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4"><img class="img-fluid rounded" src="/storage/{{$artigo->fotoartigo}}" alt="foto de {{$artigo->titulo}}" /></figure>
        <!-- Post content-->
        <section class="mb-5">
            <div class="fs-5 mb-4">
                {!! $artigo->conteudo !!}
            </div>
        </section>
</article>
   
        
        
  