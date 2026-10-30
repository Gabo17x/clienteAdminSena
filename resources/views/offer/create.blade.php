@extends('layouts.app')

@section('title', 'Ficha ' . $course->course_number . ' | AdminSENA')

@push('styles')
<style>
    .offer-hero {
        background: linear-gradient(135deg, #00324D 0%, #39A900 100%);
        border-radius: 2rem;
        overflow: hidden;
        position: relative;
        color: #ffffff;
        padding: 3rem 2.5rem 2rem;
    }
    .offer-badge {
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.4);
        color: #ffffff;
        font-weight: 700;
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
        border-radius: 9999px;
        display: inline-block;
        margin-bottom: 1rem;
    }
    .btn-sena-pill-white {
        background-color: #ffffff;
        color: #39A900 !important;
        border-radius: 9999px;
        font-weight: 700;
        padding: 0.6rem 1.6rem;
        border: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-sena-pill-white:hover {
        background-color: #f0fdf4;
        transform: translateY(-1px);
    }
    .info-bar {
        background: #ffffff;
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px -10px rgba(0,50,77,0.15);
        margin-top: -2.5rem;
        position: relative;
        z-index: 2;
        padding: 1.5rem 2rem;
    }
    .info-item i {
        color: #39A900;
        font-size: 1.3rem;
    }
    .sidebar-card {
        background: linear-gradient(160deg, #4c1d95 0%, #1e1b4b 100%);
        border-radius: 1.75rem;
        color: #ffffff;
        padding: 1.75rem;
    }
    .btn-sena-outline {
        border-radius: 9999px;
        font-weight: 600;
        padding: 0.4rem 1rem;
    }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 1150px;">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @php
        $areaItem = \App\Models\Areas::find($course->area_id);
        $centerItem = \App\Models\TrainingCenters::find($course->training_center_id);
    @endphp

    <!-- Hero -->
    <div class="offer-hero mb-0">
        <span class="offer-badge">
            <i class="bi bi-mortarboard-fill me-1"></i> Ficha de Formación
        </span>
        <h1 class="fw-black mb-4" style="font-size: 2rem; max-width: 700px;">
            {{ $areaItem ? $areaItem->name : 'Programa de Formación' }} — Ficha {{ $course->course_number }}
        </h1>

        <a href="{{ route('apprentice.create') }}" class="btn-sena-pill-white">
            Inscribir Aprendiz <i class="bi bi-arrow-right"></i>
        </a>
    </div>
    <br> <br>

    <!-- Barra de datos rápidos -->
    <div class="info-bar mb-5">
        <div class="row g-4 text-center text-md-start">
            <div class="col-6 col-md-3 info-item d-flex align-items-center gap-2 justify-content-center justify-content-md-start">
                <i class="bi bi-mortarboard"></i>
                <div>
                    <span class="d-block text-secondary small">Número de Ficha</span>
                    <span class="fw-bold" style="color: #00324D;">{{ $course->course_number }}</span>
                </div>
            </div>
            <div class="col-6 col-md-3 info-item d-flex align-items-center gap-2 justify-content-center justify-content-md-start">
                <i class="bi bi-clock"></i>
                <div>
                    <span class="d-block text-secondary small">Jornada</span>
                    <span class="fw-bold" style="color: #00324D;">{{ $course->day ?? 'No definida' }}</span>
                </div>
            </div>
            <div class="col-6 col-md-3 info-item d-flex align-items-center gap-2 justify-content-center justify-content-md-start">
                <i class="bi bi-bookmark"></i>
                <div>
                    <span class="d-block text-secondary small">Área</span>
                    <span class="fw-bold" style="color: #00324D;">{{ $areaItem ? $areaItem->name : 'Sin área' }}</span>
                </div>
            </div>
            <div class="col-6 col-md-3 info-item d-flex align-items-center gap-2 justify-content-center justify-content-md-start">
                <i class="bi bi-geo-alt"></i>
                <div>
                    <span class="d-block text-secondary small">Centro</span>
                    <span class="fw-bold" style="color: #00324D;">{{ $centerItem ? $centerItem->name : 'Sin centro' }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">

        <!-- Columna principal -->
        <div class="col-lg-8">
            <div class="form-sena-card p-4 p-md-5" style="background:#fff;border:1.5px solid #d1fae5;border-radius:2rem;">
                <h5 class="fw-bold mb-3" style="color: #00324D;">Información general</h5>
                <p class="text-secondary mb-4">
                    Esta ficha pertenece al área de <strong>{{ $areaItem ? $areaItem->name : 'Sin área asignada' }}</strong>,
                    desarrollada en el <strong>{{ $centerItem ? $centerItem->name : 'centro por definir' }}</strong>,
                    en jornada <strong>{{ $course->day ?? 'por definir' }}</strong>.
                </p>

                <div class="d-flex align-items-center gap-2 text-secondary small">
                    <i class="bi bi-calendar-event"></i>
                    <span>Registrada el 27/08/2026</span>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-card h-100 d-flex flex-column">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="fw-bold">Jornada  {{ $course->day ?? 'N/A' }}</span>
                </div>
                <span class="text-white-50 small mb-1">Código de ficha</span>
                <span class="fw-bold fs-5 mb-3">{{ $course->course_number }}</span>

                <span class="text-white-50 small mb-1">Área</span>
                <span class="fw-semibold mb-3">{{ $areaItem ? $areaItem->name : 'Sin área' }}</span>

                <span class="text-white-50 small mb-1">Centro de Formación</span>
                <span class="fw-semibold mb-4">{{ $centerItem ? $centerItem->name : 'Sin centro' }}</span>

                <div class="d-flex gap-2 mt-auto">
                    <a href="{{ route('apprentice.create') }}" class="btn-sena-pill-white flex-grow-1 justify-content-center">
                        Inscribirme <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="d-flex gap-2 mb-5">
        <a href="{{ route('course.create') }}" class="btn btn-outline-secondary btn-sena-outline">
            <i class="bi bi-arrow-left me-1"></i> Volver a Cursos
        </a>
        
    </div>

</div>
@endsection