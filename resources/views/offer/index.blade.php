@extends('layouts.app')

@section('title', 'Ofertas de Formación - AdminSENA')

@push('styles')
<style>
    .offer-card {
        background: #ffffff;
        border: 1.5px solid #e5e7eb;
        border-radius: 1.5rem;
        transition: all 0.2s ease;
    }
    .offer-card:hover {
        box-shadow: 0 15px 30px -10px rgba(0, 50, 77, 0.1);
        transform: translateY(-2px);
    }
    .badge-tag {
        background-color: #ecfdf5;
        color: #39A900;
        border-radius: 9999px;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.35rem 0.8rem;
    }
    .badge-schedule {
        background-color: #00324D;
        color: #ffffff;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 0.75rem;
        padding: 0.35rem 0.9rem;
    }
    .btn-sena-pill {
        background-color: #39A900;
        color: #ffffff !important;
        border-radius: 9999px;
        font-weight: 700;
        padding: 0.55rem 1.3rem;
        border: none;
        transition: all 0.2s ease;
    }
    .btn-sena-pill:hover {
        background-color: #2f8b00;
        color: #fff !important;
    }
    .offer-img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-radius: 1.5rem 1.5rem 0 0;
    }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 1200px;">

    <a href="{{ url('/') }}" class="text-secondary small fw-semibold d-inline-flex align-items-center gap-1 mb-4">
            <i class="bi bi-arrow-left"></i> Volver 
        </a>

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <span class="badge-tag mb-2 d-inline-block">Fichas Disponibles</span>
            <h2 class="fw-bold mb-0" style="color: #00324D;">Ofertas de Formación</h2>
        </div>
        <a href="{{ route('offers.create') }}" class="btn-sena-pill d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-circle-fill"></i> Nueva oferta
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if($offers->isEmpty())
        <div class="text-center py-5 text-secondary">
            <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
            <em>No hay ofertas registradas aún.</em>
        </div>
    @else
        <div class="row g-4">
            @foreach ($offers as $offer)
                <div class="col-md-6 col-lg-4">
                    <div class="offer-card h-100 overflow-hidden">
                        @if($offer->image)
                            <img src="{{ asset('storage/' . $offer->image) }}" class="offer-img" alt="{{ $offer->area->name ?? 'Oferta' }}">
                        @endif
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge-tag">
                                    <i class="bi bi-bookmark-fill me-1"></i>{{ $offer->area->name ?? 'Sin área' }}
                                </span>
                                <span class="badge-schedule text-capitalize">{{ $offer->schedule }}</span>
                            </div>
                            <h5 class="fw-bold mb-2" style="color: #00324D;">Ficha {{ $offer->ficha }}</h5>
                            <p class="text-secondary small mb-1">
                                <i class="bi bi-geo-alt-fill me-1" style="color: #39A900;"></i>
                                {{ $offer->trainingCenter->name ?? 'Sin sede' }}
                            </p>
                            <p class="text-secondary small mb-3">
                                <i class="bi bi-clock-fill me-1" style="color: #39A900;"></i>
                                <span class="text-capitalize">{{ $offer->schedule }}</span>
                            </p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('offers.show', $offer->id) }}" class="btn-sena-pill flex-grow-1 text-center d-inline-flex align-items-center justify-content-center gap-1">
                                    Ver detalles <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-sm btn-outline-success rounded-pill flex-grow-1">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" class="flex-grow-1 m-0" onsubmit="return confirm('¿Eliminar esta oferta?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill w-100">
                                        <i class="bi bi-trash3"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection