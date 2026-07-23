@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?auto=format&fit=crop&w=1600&q=80');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Figtree', sans-serif;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        width: 400px;
        background-color: rgba(0, 0, 0, 0.55) !important;
        border-radius: .5rem;
        border: none;
    }

    .login-card .card-header {
        background: transparent;
        border-bottom: none;
        position: relative;
        padding-top: 1.5rem;
    }

    .login-card .card-header h3 {
        color: white;
        font-weight: 700;
    }

    .login-card .input-group-text {
        width: 50px;
        justify-content: center;
        background-color: #FFC312;
        color: black;
        border: 0;
    }

    .login-card input:focus {
        outline: 0 !important;
        box-shadow: 0 0 0 0 !important;
    }

    .login-card .remember-text {
        color: white;
    }

    .login-card .remember-text input {
        width: 18px;
        height: 18px;
        margin-right: 6px;
    }

    .login-btn {
        color: black;
        background-color: #FFC312;
        border: none;
        width: 100px;
    }

    .login-btn:hover {
        color: black;
        background-color: white;
    }

    .login-card .links {
        color: white;
    }

    .login-card .links a {
        margin-left: 4px;
        color: #FFC312;
    }

    .login-card .links a:hover {
        color: white;
    }

    .alert-inside {
        margin: 0 1.25rem 1rem 1.25rem;
    }
</style>

<div class="login-wrapper">

    <div class="card login-card">

        <div class="card-header text-center">
            <h3>Iniciar Sesión</h3>
        </div>

        @if (session('status'))
            <div class="alert alert-success alert-inside">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-inside">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control"
                        placeholder="Email" value="{{ old('email') }}"
                        required autofocus autocomplete="username">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control"
                        placeholder="Contraseña" required autocomplete="current-password">
                </div>

                <div class="row align-items-center remember-text mx-0 mb-3">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me" class="mb-0">Recordarme</label>
                </div>

                <div class="form-group">
                    <input type="submit" value="Login" class="btn login-btn float-end">
                </div>

            </form>
        </div>

        <div class="card-footer bg-transparent border-0 pb-4">

            @if (Route::has('register'))
                <div class="d-flex justify-content-center links">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}">Regístrate</a>
                </div>
            @endif

            @if (Route::has('password.request'))
                <div class="d-flex justify-content-center links">
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
            @endif

        </div>

    </div>

</div>

@endsection