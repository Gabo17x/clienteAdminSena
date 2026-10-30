@extends('layouts.app')

@section('title', 'Crear cuenta - AdminSENA')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 32rem;">
        <div class="card-body p-4 p-md-5">
            <h1 class="h3 fw-bold text-sena-blue mb-4">Crear cuenta</h1>

            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-success w-100">Registrarme</button>
            </form>

            <p class="text-center mt-4 mb-0">
                ¿Ya tienes una cuenta?
                <a href="{{ url('/login') }}" class="text-sena-blue">Inicia sesión</a>
            </p>
        </div>
    </div>
</div>
@endsection
