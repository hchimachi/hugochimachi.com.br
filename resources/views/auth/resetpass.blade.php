@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="{{asset('src/img/7.png')}}" alt="logo" class="login-card-img">
                </div>
                <div class="col-md-6">
                   @include('partes.erros')
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <img src="/img/logo.png" alt="logo" class="logo">
                        </div>
                        <p class="login-card-description">Recuperar Senha</p>
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Enviar">
                        </form>
                       <p class="login-card-footer-text">Já tem uma conta? <a href="{{ route('login') }}" class="text-reset">Realize Login aqui</a></p>
                       <p class="login-card-footer-text">Ainda não tem registro? <a href="{{ route('register') }}" class="text-reset">Crie uma conta agora</a></p>
                       
                        <nav class="login-card-footer-nav">
                            <a href="#!">Termos de uso.</a>
                            <a href="#!">Politica de privacidade</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
