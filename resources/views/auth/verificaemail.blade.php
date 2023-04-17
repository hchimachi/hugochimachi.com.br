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
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <img src="/img/logo.png" alt="logo" class="logo">
                        </div>
                        <p class="login-card-description">Você precisa confirmar o e-mail para validar o cadastro</p>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                           
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Reenviar o e-mail">
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
@endsection
