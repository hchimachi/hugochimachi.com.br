@extends('layouts.base')
@section('content')
    @include('home.menu')
    @include('home.inicio')
    @include('home.sobre')
    @include('home.artigo')
     <!-- CLASS -->
     <!-- SCHEDULE -->
     <!-- CONTACT -->
     <section class="contact section" id="contact">
          <div class="container">
               <div class="row">

                    <div class="ml-auto col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Entre em contato</h2>

                        <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                            <input type="text" class="form-control" name="cf-name" placeholder="Nome">

                            <input type="email" class="form-control" name="cf-email" placeholder="Email">

                            <textarea class="form-control" rows="5" name="cf-message" placeholder="Menssagem"></textarea>

                            <button type="submit" class="form-control" id="submit-button" name="submit">Enviar</button>
                        </form>
                    </div>

                    <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Escritório com sede em: <span></span></h2>

                        <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>Av. Dr. Morato, 525 Vila Rezende Piracicaba-SP </p>
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
                        <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                                       
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.5726051361657!2d-47.66037518572581!3d-22.706948985113765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c631639b7e98d7%3A0x14234e77383b4671!2sAv.%20Dr.%20Morato%2C%20525%20-%20Vila%20Rezende%2C%20Piracicaba%20-%20SP%2C%2013405-260!5e0!3m2!1spt-BR!2sbr!4v1681051597971!5m2!1spt-BR!2sbr" width="1920" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    
               </div>
          </div>
     </section>


    @include('home.footer')




    
@endsection