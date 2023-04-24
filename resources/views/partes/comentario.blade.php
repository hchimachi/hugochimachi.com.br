<section class="mb-5">
    <div class="card bg-dark">
        <div class="card-body">
        <!-- Comment form-->
            <form class="mb-4 bg-dark" method="post" action="{{route('g.comentario')}}">
            @csrf   
            <input type="hidden" name="artigoid" value="{{$artigo->id}}">
            <textarea name="comentario" class="form-control" rows="3" placeholder="Comente o artigo"></textarea>
            <input type="submit" value="Grava Comentario">
        </form>
                <!-- Comment with nested comments-->
                @foreach($comentarios as $comentarios)
                <div class="d-flex mb-4">
                    <!-- Parent comment-->
                        
                        <div class="flex-shrink-0"><img class="rounded-circle comentario" src="/storage/{{$comentarios->foto}}" alt="foto-{{$comentarios->name}}" /></div>
                        <div class="ms-3">
                            <div class="fw-bold">{{$comentarios->name}} em: {{date('d/m/Y', strtotime($comentarios->created_at))}} as {{date('H:i', strtotime($comentarios->created_at))}}</div>
                            {{$comentarios->conteudo}}
                                <br>
                                @if(auth::user()->id === $comentarios->user_id)
                                <a href="{{route('apaga.comentario', $comentarios->id)}}">Apagar comentario</a>
                                @endif
                                
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Responder
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form class="mb-4 bg-dark" method="post" action="{{route('g.respcomentario')}}">
                                                @csrf   
                                                <input type="hidden" name="coment" value="{{$comentarios->id}}">
                                                <textarea name="resposta" class="form-control" rows="3" placeholder="Responder"></textarea>
                                                <input type="submit" class=" btn btn-primary" value="Responder Comentario">
                                            </form>
                                        </div>
                                    </div>
                            
                                    
                            @for($i = 0; $i < $total->total ; $i++)
                            @if($resposta[$i]->comentario_id===$comentarios->id)
                          
                            <!-- Child comment 1-->
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle comentario" src="/storage/{{$resposta[$i]->foto}}" alt="foto de {{$resposta[$i]->name}}" /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{$resposta[$i]->resposta}}</div>
                                    
                                    @if(auth::user()->id === $resposta[$i]->user_id)
                                
                                <a href="{{route('apaga.rescomentario', $resposta[$i]->id)}}">Apagar Resposta</a>
                                @endif
                                </div>
                               
                            </div>
                            @endif
                            @endfor    
                                
                        </div>
                        
                </div>
                @endforeach                   
                                
        </div>
    </div>
</section>