<section class="class section" id="class">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center mb-5">
            <h2 data-aos="fade-up">Nossos Últimos Artigos Publicados</h2>
            <p data-aos="fade-up" data-aos-delay="200">Se Gostar Compartilhe</p>
            </div>
            @foreach($artigo as $artigo)
            <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                <div class="class-thumb">
                    <img src="storage/{{$artigo->foto}}" class="img-fluid" alt="foto{{$artigo->titulo}}">

                        <div class="class-info">
                            <h3 class="mb-1">{{$artigo->titulo}}</h3>
                            <span><strong>Autor</strong> <br>- {{$artigo->nomecompleto}}</span><br>
                                @if(!$artigo->facebook==null)
                                    <a href="https://www.facebook.com/{{$artigo->facebook}}" class="fa fa-facebook"></a>
                                @endif
                                @if(!$artigo->twiter==null)
                                    <a href="https://twitter.com/{{$artigo->twiter}}" class="fa fa-twitter"></a>
                                @endif                                            
                                @if(!$artigo->youtube==null)
                                    <a href="https://www.youtube.com/{{$artigo->youtube}}" class="fa fa-youtube"></a>
                                @endif
                                @if(!$artigo->instagram==null)
                                    <a href="https://www.instagram.com/{{$artigo->instagram}}" class="fa fa-instagram"></a></p>
                                @endif    
                            
                            <p>Publicado em: <span>{{date('d/m/Y', strtotime($artigo->datapublica))}} às {{date('H:i:s', strtotime($artigo->datapublica))}}</span></p>
                                @php $resumo=Illuminate\Support\Str::of($artigo->conteudo ?? '')->words(20) @endphp               
                            <p class="mt-3">{!! $resumo !!} <a href="blog/{{$artigo->slug}}/{{$artigo->artslug}}">Saiba mais</a></p>
                                @php $resumo =null;
                                echo $resumo;
                                @endphp
                        </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</section>
