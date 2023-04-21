@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="margin-bottom: 20px">
        <div style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; padding: 0px 20px">
            <a href='/' role="button"><img class="navbar-brand" src="../images/favicon/logoPrincipal.svg" height="100px"
                    width="100px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="mynavbar" style="display: flex; align-items: center">
                @if (Route::has('login'))
                    <div class="d-flex">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary customButtonLogin">Home</a>
                            <a href="{{ url('/closeSesion') }}" class="btn btn-primary customButtonLogin">Log Out</a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('login') }}" class="btn btn-primary customButtonLogin">Log in</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 40px">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="nombre"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="nombre"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="idioma_nativo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Idioma nativo') }}</label>
                                <div class="col-md-6">
                                    <select name="idioma_nativo" id="idioma_nativo"
                                        class="form-control @error('idioma_nativo') is-invalid @enderror">
                                        <option value="Espanyol">Espanyol</option>
                                        <option value="Inglés">Inglés</option>
                                        <option value="Francés">Francés</option>
                                        <option value="Alemán">Alemán</option>
                                    </select>
                                    @error('idioma_nativo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="idioma_aprender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Idioma a aprender') }}</label>
                                <div class="col-md-6">
                                    <select name="idioma_aprender" id="idioma_aprender"
                                        class="form-control @error('idioma_aprender') is-invalid @enderror">
                                        <option value="Espanyol">Espanyol</option>
                                        <option value="Inglés">Inglés</option>
                                        <option value="Francés">Francés</option>
                                        <option value="Alemán">Alemán</option>
                                    </select>

                                    @error('idioma_aprender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- <div class="row mb-3">
                                <label for="imagen"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>
                                <div class="col-md-6">
                                    <input id="imagen" type="file"
                                        class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                                        required>
                                    @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-0">
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
    </div>
@endsection
