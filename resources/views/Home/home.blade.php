@extends('layouts.app')

@section('title', 'AdminSENA - Inicio')

@push('styles')
<style>
    :root {
        --sena-green: #39A900;
        --sena-green-hover: #2f8b00;
        --sena-blue: #ffffff;
    }
    .btn-sena-pill {
        background-color: var(--sena-green);
        color: #ffffff !important;
        border-radius: 9999px;
        font-weight: 700;
        padding: 0.55rem 1.4rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: all 0.2s ease;
        border: none;
    }
    .btn-sena-pill:hover {
        background-color: var(--sena-green-hover);
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(57, 169, 0, 0.3);
    }
    .hero-card {
        background: #ffffff;
        border: 1.5px solid #d1fae5;
        border-radius: 2rem;
        box-shadow: 0 20px 40px -15px rgba(0, 50, 77, 0.07);
    }
    .pilar-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 1.75rem;
        overflow: hidden;
        box-shadow: 0 4px 12px -2px rgba(0,0,0,0.04);
        transition: all 0.25s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .pilar-card:hover {
        transform: translateY(-5px);
        border-color: #a7f3d0;
        box-shadow: 0 16px 32px -10px rgba(57, 169, 0, 0.18);
    }
    .pilar-img {
        height: 190px;
        width: 100%;
        object-fit: cover;
        border-top-left-radius: 1.75rem;
        border-top-right-radius: 1.75rem;
    }
    .carousel-arrow {
        width: 38px;
        height: 38px;
        background: rgba(100, 116, 139, 0.85);
        transition: background 0.2s ease;
    }
    .carousel-arrow:hover {
        background: rgba(15, 23, 42, 0.95);
    }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 1200px;">

    <!-- Hero Banner con Flechas Laterales -->
    <div class="position-relative px-2 px-md-5 mb-5">

        <button type="button" data-bs-target="#heroInnerCarousel" data-bs-slide="prev" class="carousel-arrow position-absolute start-0 top-50 translate-middle-y rounded-circle text-white d-flex align-items-center justify-content-center shadow border-0 z-3">
            <i class="bi bi-chevron-left fs-6"></i>
        </button>

        <section class="hero-card p-4 p-md-5">
            <div class="row align-items-center g-4">

                <div class="col-lg-6">
                    <span class="badge rounded-pill px-3 py-1 mb-3" style="background: #ecfdf5; color: #39A900; border: 1px solid #a7f3d0; font-size: 0.75rem; font-weight: 700;">
                        ADSO
                    </span>

                    <h1 class="mb-3" style="font-weight: 900; color: #00324D; font-size: calc(1.6rem + 1.2vw); line-height: 1.15;">
                        Administra Ambientes y Equipos Fácilmente
                    </h1>

                    <p class="text-secondary mb-4" style="font-size: 0.88rem; line-height: 1.6;">
                        La plataforma centralizada para la asignación y seguimiento de hardware, control de ambientes formativos y fichas académicas del centro de formación.
                    </p>

                    <a href="#pilares" class="btn-sena-pill" style="font-size: 0.82rem; padding: 0.65rem 1.6rem;">
                        Explorar Módulos
                    </a>
                </div>

                <div class="col-lg-6">
                    <div id="heroInnerCarousel" class="carousel slide carousel-fade rounded-4 overflow-hidden shadow-sm" data-bs-ride="carousel" data-bs-interval="4500" style="height: 320px;">
                        <div class="carousel-inner h-100">
                            <div class="carousel-item active h-100">
                                <img src="{{ asset('images/imagenes ocho.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 1">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/imagenes dos.jpeg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 2">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/imagenes tres.JPG') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 3">
                            </div>

                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/imagenes cinco.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 5">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="{{ asset('images/imagenes seis.webp') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 6">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-4 pt-4 border-top d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-4 gap-md-5">
                    <div>
                        <span class="d-block text-muted text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.05em;">¿Qué Buscas?</span>
                        <span class="fw-semibold text-dark" style="font-size: 0.82rem;">Ambientes, Fichas, Instructores...</span>
                    </div>
                    <div class="border-start ps-4">
                        <span class="d-block text-muted text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.05em;">Estado Actual</span>
                        <span class="fw-semibold text-dark d-flex align-items-center gap-2" style="font-size: 0.82rem;">
                            Todos los módulos
                        </span>
                    </div>
                </div>

                <a href="#pilares" class="btn-sena-pill" style="font-size: 0.8rem; padding: 0.5rem 1.4rem;">
                    Consultar
                </a>
            </div>
        </section>

        <button type="button" data-bs-target="#heroInnerCarousel" data-bs-slide="next" class="carousel-arrow position-absolute end-0 top-50 translate-middle-y rounded-circle text-white d-flex align-items-center justify-content-center shadow border-0 z-3">
            <i class="bi bi-chevron-right fs-6"></i>
        </button>
    </div>

    <!-- ¿Qué es AdminSENA? -->
    <section class="row align-items-center g-5 my-5 mx-auto" style="max-width: 980px;">
        <div class="col-lg-6">
            <h2 class="mb-3" style="font-weight: 900; color: #00324D; font-size: 1.8rem;">
                ¿Qué es AdminSENA?
            </h2>
            <p class="text-secondary mb-4" style="font-size: 0.86rem; line-height: 1.6;">
                Es una solución interactiva desarrollada para optimizar los procesos de gestión en el área académica y tecnológica. Permitimos a los coordinadores e instructores realizar un control riguroso de las herramientas de cómputo y el agendamiento físico del centro formativo.
            </p>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('quienes-somos') }}" class="btn-sena-pill" style="font-size: 0.8rem;">
                    Conocer más
                </a>
                <a href="#" class="text-secondary fw-bold ms-2 text-decoration-underline" style="font-size: 0.8rem;">
                    Ver manual de uso
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <img src="{{ asset('images/imagenes siete.jpg') }}" alt="SENA" class="rounded-4 shadow-sm w-100 object-fit-cover" style="height: 250px;">
        </div>
    </section>

    <!-- Ofertas de Formación -->
    <section id="pilares" class="my-5">
        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
            <div>
                <span class="badge rounded-pill px-3 py-1 mb-2" style="background: #ecfdf5; color: #39A900; border: 1px solid #a7f3d0; font-size: 0.75rem; font-weight: 700;">
                    Fichas Disponibles
                </span>
                <h2 class="mb-0" style="font-weight: 900; color: #00324D; font-size: 1.8rem;">
                    Ofertas de Formación
                </h2>
                <br>
            </div>

            <a href="{{ route('offers.create') }}" class="btn-sena-pill">
                <i class="bi bi-plus-circle-fill"></i> Añadir Oferta
            </a>
        </div>

        @if(!isset($offers) || $offers->isEmpty())
            <div class="text-center py-5 text-secondary">
                <i class="bi bi-mortarboard fs-1 d-block mb-2"></i>
                <em>No hay ofertas de formación disponibles por el momento.</em>
            </div>
        @else
            <div class="row g-4">
                @foreach ($offers as $offer)
                    <div class="col-md-6 col-lg-4">
                        <div class="pilar-card position-relative">

                            <span class="position-absolute top-0 end-0 m-3 badge rounded-pill px-3 py-2" style="background: #00324D; color: #ffffff; font-size: 0.7rem; font-weight: 700; z-index: 2;">
                                {{ ucfirst($offer->schedule) ?? 'Sin jornada' }}
                            </span>

                            <div class="p-4 d-flex flex-column h-100">
                                <span class="badge rounded-pill align-self-start mb-3" style="background: #ecfdf5; color: #39A900; border: 1px solid #a7f3d0; font-size: 0.7rem; font-weight: 700;">
                                    <i class="bi bi-bookmark-fill me-1"></i>{{ $offer->area->name ?? 'Sin área' }}
                                </span>

                                <h5 class="fw-bold mb-3" style="color: #00324D; line-height: 1.3;">
                                    Ficha {{ $offer->ficha }}
                                </h5>

                                <div class="d-flex flex-column gap-2 mb-3 text-secondary small">
                                    <span><i class="bi bi-geo-alt-fill me-2" style="color: #39A900;"></i>{{ $offer->trainingCenter->name ?? 'Centro por definir' }}</span>
                                    <span><i class="bi bi-clock-fill me-2" style="color: #39A900;"></i>{{ ucfirst($offer->schedule) }}</span>
                                </div>

                                <a href="{{ route('offers.show', $offer->id) }}" class="btn-sena-pill mt-auto align-self-start" style="font-size: 0.78rem; padding: 0.5rem 1.3rem;">
                                    Ver detalles <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

</div>
@endsection