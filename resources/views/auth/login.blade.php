@extends('layouts.app')

@section('content')
<div class="container" id="contenedorgral">
    <div class="row justify-content-between" style="padding-top:130px;padding-bottom:100px;">
        <div class="col-md-6 col-lg-7 col-xl-7">
            <img src="{{ asset('img/log.svg') }}" class="d-sm-none d-md-block d-none d-xs-block" alt="Kiwi standing on oval" width="100%">
        </div>
        <div class="col-md-6 col-lg-5 col-xl-5">
            <div class="card border-light" style="background:#EBF1F7;border-radius: 13px">
                <h3 class="ml-3 mt-4" style="color:#6c02fc">{{ __('Iniciar Sesion') }}</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Correo') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>


                        </div>
                        <div class="form-group">
                            <button type="submit" style="width:100%" id="btn-grad" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" style="color:#6c02fc;padding-left:0px"  style="padding-left:0px" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                            @endif

                        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
