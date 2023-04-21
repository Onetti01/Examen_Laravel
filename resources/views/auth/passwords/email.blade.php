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
                        <a href="{{ url('/closeAdmin') }}" class="btn btn-primary customButtonLogin">Tancar sessió</a>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
