@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="{{asset('src/img/7.png')}}" alt="logo" class="login-card-img">
                </div>
                <div class="col-md-6">
            
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <img src="/img/logo.png" alt="logo" class="logo">
                        </div>
                        <p class="login-card-description">Recuperar Senha</p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{$request->route('token')}}"
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control is-invalid" value="{{$request->email}}">
                            
                            </div>
                               <div class="form-group mb-4">
                                <label for="password" class="sr-only">Senha</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Confirmar Senha</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Senha">
                            </div>
                            
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Gravar">
                        </form>
                       
                       
                    </div>
                </div>
            </div>
        </div>
@endsection
