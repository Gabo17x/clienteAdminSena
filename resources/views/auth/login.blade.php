@extends('layouts.app')

@section('title', 'Iniciar sesión - AdminSENA')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 32rem;">
        <div class="card-body p-4 p-md-5">
            <h1 class="h3 fw-bold text-sena-blue mb-4">Iniciar sesión</h1>

            @if (session('status'))
                <div class="alert alert-success" role="status">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="username" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input id="remember" type="checkbox" name="remember" class="form-check-input" @checked(old('remember'))>
                    <label for="remember" class="form-check-label">Recordarme</label>
                </div>

                <button type="submit" class="btn btn-success w-100">Iniciar sesión</button>
            </form>

            <div class="d-flex flex-column align-items-center gap-2 mt-4">
                <a href="{{ url('/forgot-password') }}" class="text-sena-blue">¿Olvidaste tu contraseña?</a>
                <a href="{{ url('/register') }}" class="text-sena-blue">Crear una cuenta</a>
            </div>
        </div>
    </div>
</div>
@endsection
