@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
<div class="container py-5" style="max-width: 900px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h2 class="fw-bold mb-4 text-sena-blue">Perfil de usuario</h2>

            @if (session('status') === 'profile-updated')
                <div class="alert alert-success rounded-4">Perfil actualizado correctamente.</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="mb-5">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre</label>
                    <input id="name" name="name" type="text" class="form-control rounded-pill @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                    <input id="email" name="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success rounded-pill px-4">Guardar cambios</button>
            </form>

            <div class="border-top pt-4">
                <h3 class="h5 fw-bold mb-3 text-sena-blue">Eliminar cuenta</h3>
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña actual</label>
                        <input id="password" name="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4">Eliminar mi cuenta</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
