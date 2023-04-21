@extends('layouts.app')
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@section('content')

<nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="margin-bottom: 20px">
    <div style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; padding: 0px 20px">
        <a href='/' role="button"><img class="navbar-brand" src="../images/favicon/logoPrincipal.svg" height="100px" width="100px" /></a>
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
@auth
<h2>Bienvenido {{ Illuminate\Support\Facades\Auth::user()->nombre}}, aquí estan tus opciones:</h2>
<div style="display: flex; flex-direction: row; margin: 20px">
    <a style="margin-right: 20px" href="{{ route('mostrarNativos',  Illuminate\Support\Facades\Auth::user()->idioma_aprender) }}" class="btn btn-primary customButtonLogin">ver personas que me pueden ayudar</a>
    <a style="margin-right: 20px" href="{{ route('darseBaja',  Illuminate\Support\Facades\Auth::user()->email) }}" class="btn btn-primary customButtonLogin">darse de baja</a>
</div>
@else
<p>Bienvenido</p>
@endauth
@endsection
