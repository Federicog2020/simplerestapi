@extends('layouts.app')

@section('title')
    Registrarse
@endsection

@section('styles')
    <link href="{{ asset('css/form_register.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('js/form_register.js') }}" defer></script>
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
            <form class="form-horizontal"  method="POST" action="{{ route('register') }}">
                @csrf

                <div class="heading">Regístrese</div>
                <div class="form-group">
                    <i class="fa fa-user"></i><input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <i class="fa fa-envelope"></i><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <i class="fa fa-lock"></i><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <i class="fa fa-check"></i><input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar password" required autocomplete="new-password">
                </div>
                <div class="form-terms">
                        <input type="checkbox" class="@error('terms') is-invalid @enderror" id="terms" name="terms" value="1" />
                        <span>Acepto los <a href="" id="link-terms">Términos & Condiciones</a></span>
                        @error('terms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default">{{ __('Registrarse') }}</button>
                        <span class="form-login">Ya se registró? <a href="{{ route('login')}}">Ingresar</a></span>
                    </div>
                </div>
                <div class="form-footer">
                    <span>Regístrese con Redes Sociales</span>
                    <ul class="social">
                        <li><a class="fab fa-facebook-f" href=""></a></li>
                        <li><a class="fab fa-twitter" href=""></a></li>
                        <li><a class="fab fa-instagram" href=""></a></li>
                        <li><a class="fab fa-pinterest" href=""></a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>

    <!-- 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    -->
</div>
@endsection

@include('includes.terms_service')
