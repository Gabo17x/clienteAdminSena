@extends('layouts.app')

@section('title', 'Inicio - AdminSENA')

@section('content')
<div class="container py-5">
    <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm border">
        <p class="text-sena-green fw-semibold mb-2">ADMINISTRACIÓN SENA</p>
        <h1 class="display-5 fw-bold text-sena-blue">Bienvenido a AdminSENA</h1>
        <p class="lead text-secondary mb-4">
            Gestiona desde un solo lugar las áreas de formación y la información de tu centro.
        </p>
        <a href="{{ route('area.index') }}" class="btn btn-success rounded-pill px-4">
            <i class="bi bi-journal-bookmark me-2"></i>Ver áreas de formación
        </a>
    </div>
</div>
@endsection