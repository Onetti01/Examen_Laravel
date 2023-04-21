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
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
