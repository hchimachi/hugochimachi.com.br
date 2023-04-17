<section class="about section" id="about">
               <div class="container">
                    <div class="row">

                            <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Olá,</h2>

                                <p data-aos="fade-up" data-aos-delay="400">Somos um escritório de advocacia focado em direito civil, previdenciário e família.</p>

                                <p data-aos="fade-up" data-aos-delay="500">Muito embora atuemos em outras áreas como penal, tributário, eleitoral e societário, o nosso foco de estudo e maior parte de nossas causas são das áreas acima.</p>

                            </div>
                            @if(isset($autor))
                            @foreach($autor as $autor)
                                <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                                    <div class="team-thumb">
                                        <img src="/storage/{{$autor->foto}}" class="img-fluid" alt="autor-{{$autor->name}}">

                                        <div class="team-info d-flex flex-column">
                                        
                                        
                                            <h3>{{$autor->nomecompleto}}</h3>
                                        <span>Advogada especialista<br>em direito previdenciário</span>
                                        <p>
                                            @if(!$autor->facebook==null)
                                            <a href="https://www.facebook.com/{{$autor->facebook}}" class="fa fa-facebook"></a>
                                            @endif
                                            @if(!$autor->twiter==null)
                                            <a href="https://twitter.com/{{$autor->twiter}}" class="fa fa-twitter"></a>
                                            @endif
                                            @if(!$autor->youtube==null)
                                            <a href="https://www.youtube.com/{{$autor->youtube}}" class="fa fa-youtube"></a>
                                            @endif
                                            @if(!$autor->instagram==null)
                                            <a href="https://www.instagram.com/{{$autor->instagram}}" class="fa fa-instagram"></a></p>
                                            @endif
                                       
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>

                            

                    </div>
               </div>
     </section>
