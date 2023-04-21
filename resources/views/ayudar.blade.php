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

    <div class="table-responsive" style="margin-top: 2%">
        @if (sizeof($usuarios) == 0)
        <div class="alert alert-danger">
            No hay usuarios que mostrar
        </div>
        @else
        <table class="table">
            <tr>
                <th>nombre</th>
                <th>email</th>
                <th>idioma nativo</th>
                <th>idioma a aprender</th>
            </tr>
            @foreach ($usuarios as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->idioma_nativo}}</td>
                <td>{{$item->idioma_aprender}}</td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
@endsection