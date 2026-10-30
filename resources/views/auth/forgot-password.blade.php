@extends('layouts.app')

@section('title', 'Recuperar contraseña - AdminSENA')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 32rem;">
        <div class="card-body p-4 p-md-5">
            <h1 class="h3 fw-bold text-sena-blue mb-3">¿Olvidaste tu contraseña?</h1>
            <p class="text-secondary mb-4">Indícanos tu correo y te enviaremos un enlace para restablecerla.</p>

            @if (session('status'))
                <div class="alert alert-success" role="status">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ url('/forgot-password') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100">Enviar enlace de recuperación</button>
            </form>

            <p class="text-center mt-4 mb-0">
                <a href="{{ url('/login') }}" class="text-sena-blue">Volver a iniciar sesión</a>
            </p>
        </div>
    </div>
</div>
@endsection
