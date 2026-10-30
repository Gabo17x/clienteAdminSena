@extends('layouts.app')

@section('title', 'Detalle de Oferta - AdminSENA')

@push('styles')
<style>
    :root {
        --sena-green: #39A900;
        --sena-green-hover: #2f8b00;
        --sena-blue: #00324D;
    }
    .btn-sena-pill {
        background-color: var(--sena-green);
        color: #ffffff !important;
        border-radius: 9999px;
        font-weight: 700;
        padding: 0.6rem 1.6rem;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: all 0.2s ease;
    }
    .btn-sena-pill:hover {
        background-color: var(--sena-green-hover);
        color: #fff !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(57, 169, 0, 0.3);
    }
    .offer-hero {
        border-radius: 2rem;
        overflow: hidden;
        box-shadow: 0 20px 40px -15px rgba(0, 50, 77, 0.15);
        position: relative;
        background: linear-gradient(135deg, #00324D 0%, #005b8a 100%);
    }
    .offer-hero-img {
        width: 100%;
        height: 340px;
        object-fit: cover;
        opacity: 0.92;
    }
    .offer-hero-placeholder {
        width: 100%;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.5);
        font-size: 3.5rem;
    }
    .offer-hero-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        background: linear-gradient(to top, rgba(0,50,77,0.92) 0%, rgba(0,50,77,0) 100%);
        padding: 2rem;
        color: #fff;
    }
    .badge-tag {
        background: rgba(255,255,255,0.95);
        color: var(--sena-green);
        border-radius: 9999px;
        font-weight: 700;
        font-size: 0.78rem;
        padding: 0.4rem 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }
    .badge-schedule {
        background: var(--sena-green);
        color: #fff;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 0.78rem;
        padding: 0.4rem 1rem;
    }
    .info-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 1.5rem;
        padding: 1.5rem;
        height: 100%;
        transition: all 0.2s ease;
    }
    .info-card:hover {
        border-color: #a7f3d0;
        box-shadow: 0 8px 20px -8px rgba(57, 169, 0, 0.15);
    }
    .info-icon {
        width: 42px;
        height: 42px;
        border-radius: 0.9rem;
        background: #ecfdf5;
        color: var(--sena-green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        margin-bottom: 0.75rem;
    }
    .info-label {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #94a3b8;
        font-weight: 700;
    }
    .info-value {
        font-size: 1.1rem;
        color: var(--sena-blue);
        font-weight: 800;
    }
    .desc-card {
        background: #f8fafc;
        border-radius: 1.5rem;
        padding: 1.75rem;
        border: 1px solid #e2e8f0;
    }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 950px;">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <a href="{{ route('home') }}" class="text-secondary small fw-semibold d-inline-flex align-items-center gap-1 mb-3">
        <i class="bi bi-arrow-left"></i> Volver a inicio    
    </a>

    <!-- Hero -->
    <div class="offer-hero mb-4">
        @if($offer->image)
            <img src="{{ asset('storage/' . $offer->image) }}" class="offer-hero-img" alt="{{ $offer->area->name ?? 'Oferta' }}">
        @else
            <div class="offer-hero-placeholder">
                <i class="bi bi-mortarboard"></i>
            </div>
        @endif

        <div class="offer-hero-overlay">
            <div class="d-flex flex-wrap gap-2 mb-2">
                <span class="badge-tag">
                    <i class="bi bi-bookmark-fill"></i> {{ $offer->area->name ?? 'Sin área' }}
                </span>
                <span class="badge-schedule text-capitalize">{{ $offer->schedule }}</span>
            </div>
            <h1 class="fw-bold mb-0" style="font-size: 1.9rem;">Ficha {{ $offer->ficha }}</h1>
        </div>
    </div>

    <!-- INCRIBIRSE-->

    <a href="{{ route('apprentice.create', ['offer' => $offer->id]) }}" class="btn-sena-pill" style="font-size: 0.8rem;">
    Inscribirse
    </a>
    <br> <br>

    <!-- Tarjetas de info rápida -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="info-card">
                <div class="info-icon"><i class="bi bi-mortarboard-fill"></i></div>
                <div class="info-label">Tipo de Programa</div>
                <div class="info-value" style="font-size: 0.95rem;">{{ $offer->type }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="info-card">
                <div class="info-icon"><i class="bi bi-calendar3"></i></div>
                <div class="info-label">Duración</div>
                <div class="info-value" style="font-size: 0.95rem;">{{ $offer->duration }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="info-card">
                <div class="info-icon"><i class="bi bi-laptop"></i></div>
                <div class="info-label">Modalidad</div>
                <div class="info-value text-capitalize" style="font-size: 0.95rem;">{{ $offer->modality }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="info-card">
                <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                <div class="info-label">Sede</div>
                <div class="info-value" style="font-size: 0.9rem;">{{ $offer->trainingCenter->name ?? 'Sin asignar' }}</div>
            </div>
        </div>
    </div>


    <!-- Descripción -->
    <div class="desc-card mb-4">
        <div class="info-label mb-2">Descripción del Programa</div>
        <p class="text-secondary mb-0" style="line-height: 1.7;">{{ $offer->description }}</p>
    </div>

    <!-- Acciones -->
    <!--<div class="d-flex gap-2 pb-5">
        <a href="{{ route('offers.edit', $offer->id) }}" class="btn-sena-pill">
            <i class="bi bi-pencil-square"></i> Editar
        </a>
        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta oferta?');">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-outline-danger rounded-pill px-4 py-2 fw-semibold">
                <i class="bi bi-trash3 me-1"></i> Eliminar
            </button>
        </form>-->
        <a href="{{ route('offers.index') }}" class="btn-sena-pill">
            Volver
        </a>
    </div>

</div>
@endsection