@extends('auth._auth_layout')

@section('content')
    <form class="form-signin" id="loginForm">
        @csrf
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
        </div>
        <div class="form-label-group">
            <input type="text" id="user" class="form-control" placeholder="Usuario" required="" autofocus="">
            <label for="user">Usuario</label>
        </div>
        <div id="errorUser"></div>
        <div class="form-label-group">
            <input type="password" id="password" class="form-control" placeholder="Contraseña" required="">
            <label for="password">Constraseña</label>
        </div>
        <div id="errorPassword"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Inicia Sesion</button>
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/auth/login.js') }}"></script>
@endsection