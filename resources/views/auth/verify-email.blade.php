@extends('layouts.app')

@section('title', 'Verificar correo - AdminSENA')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 32rem;">
        <div class="card-body p-4 p-md-5">
            <h1 class="h3 fw-bold text-sena-blue mb-3">Verifica tu correo electrónico</h1>
            <p class="text-secondary mb-4">
                Antes de continuar, revisa tu correo y sigue el enlace de verificación. Si no recibiste el mensaje, puedes solicitar otro.
            </p>

            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success" role="status">
                    Enviamos un nuevo enlace de verificación a tu correo.
                </div>
            @endif

            <form method="POST" action="{{ url('/email/verification-notification') }}">
                @csrf
                <button type="submit" class="btn btn-success w-100">Reenviar correo de verificación</button>
            </form>
        </div>
    </div>
</div>
@endsection
