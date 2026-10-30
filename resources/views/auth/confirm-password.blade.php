@extends('layouts.app')

@section('title', 'Confirmar contraseña - AdminSENA')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 32rem;">
        <div class="card-body p-4 p-md-5">
            <h1 class="h3 fw-bold text-sena-blue mb-3">Confirmar contraseña</h1>
            <p class="text-secondary mb-4">Por seguridad, confirma tu contraseña para continuar.</p>

            <form method="POST" action="{{ url('/user/confirm-password') }}">
                @csrf

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" autofocus>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100">Confirmar</button>
            </form>
        </div>
    </div>
</div>
@endsection
