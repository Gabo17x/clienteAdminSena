@extends('layouts.app')

@section('title', 'Editar Oferta - AdminSENA')

@push('styles')
<style>
    .form-sena-card {
        background: #ffffff;
        border: 1.5px solid #d1fae5;
        border-radius: 2rem;
        box-shadow: 0 20px 40px -15px rgba(0, 50, 77, 0.07);
    }
    .btn-sena-pill {
        background-color: #39A900;
        color: #ffffff !important;
        border-radius: 9999px;
        font-weight: 700;
        padding: 0.6rem 1.6rem;
        border: none;
        transition: all 0.2s ease;
    }
    .btn-sena-pill:hover {
        background-color: #2f8b00;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(57, 169, 0, 0.3);
    }
    .form-control:focus,
    .form-select:focus {
        border-color: #39A900;
        box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15);
    }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 800px;">

    <div class="mb-4">
        <h2 class="fw-bold" style="color: #00324D;">Editar Oferta</h2>
        <p class="text-secondary small mb-0">Actualiza la información de la ficha #{{ $offer->ficha }}</p>
    </div>

    <div class="form-sena-card p-4 p-md-5">

        @if ($errors->any())
            <div class="alert alert-danger rounded-4 py-2 px-3 small mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                {{ $errors->first() }}
            </div>
        @endif

        @if($offer->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $offer->image) }}" alt="Imagen actual" class="rounded-4" style="max-height: 180px; object-fit: cover;">
            </div>
        @endif

        <form action="{{ route('offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label for="ficha" class="form-label small fw-bold text-secondary">Número de Ficha</label>
                    <input type="text" name="ficha" id="ficha"
                           class="form-control rounded-pill py-2 @error('ficha') is-invalid @enderror"
                           value="{{ old('ficha', $offer->ficha) }}" required>
                    @error('ficha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="duration" class="form-label small fw-bold text-secondary">Duración</label>
                    <input type="text" name="duration" id="duration"
                           class="form-control rounded-pill py-2 @error('duration') is-invalid @enderror"
                           value="{{ old('duration', $offer->duration) }}" required>
                    @error('duration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label small fw-bold text-secondary">Descripción</label>
                    <textarea name="description" id="description" rows="3"
                              class="form-control rounded-4 py-2 @error('description') is-invalid @enderror"
                              required>{{ old('description', $offer->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label small fw-bold text-secondary">Tipo de Programa</label>
                    <input type="text" name="type" id="type"
                           class="form-control rounded-pill py-2 @error('type') is-invalid @enderror"
                           value="{{ old('type', $offer->type) }}" required>
                    @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="modality" class="form-label small fw-bold text-secondary">Modalidad</label>
                    <select name="modality" id="modality" class="form-select rounded-pill py-2 @error('modality') is-invalid @enderror" required>
                        <option value="presencial" {{ old('modality', $offer->modality) == 'presencial' ? 'selected' : '' }}>Presencial</option>
                        <option value="virtual" {{ old('modality', $offer->modality) == 'virtual' ? 'selected' : '' }}>Virtual</option>
                    </select>
                    @error('modality')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="schedule" class="form-label small fw-bold text-secondary">Jornada</label>
                    <select name="schedule" id="schedule" class="form-select rounded-pill py-2 @error('schedule') is-invalid @enderror" required>
                        <option value="tarde" {{ old('schedule', $offer->schedule) == 'tarde' ? 'selected' : '' }}>Tarde</option>
                        <option value="diurna" {{ old('schedule', $offer->schedule) == 'diurna' ? 'selected' : '' }}>Diurna</option>
                        <option value="noche" {{ old('schedule', $offer->schedule) == 'noche' ? 'selected' : '' }}>Noche</option>
                    </select>
                    @error('schedule')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="area_id" class="form-label small fw-bold text-secondary">Área</label>
                    <select name="area_id" id="area_id" class="form-select rounded-pill py-2 @error('area_id') is-invalid @enderror">
                        <option value="">Seleccione un área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id', $offer->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                    @error('area_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="training_center_id" class="form-label small fw-bold text-secondary">Sede</label>
                    <select name="training_center_id" id="training_center_id" class="form-select rounded-pill py-2 @error('training_center_id') is-invalid @enderror">
                        <option value="">Seleccione una sede</option>
                        @foreach ($trainingCenters as $center)
                            <option value="{{ $center->id }}" {{ old('training_center_id', $offer->training_center_id) == $center->id ? 'selected' : '' }}>{{ $center->name }}</option>
                        @endforeach
                    </select>
                    @error('training_center_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label for="image" class="form-label small fw-bold text-secondary">Cambiar Foto (opcional)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                           class="form-control rounded-pill py-2 @error('image') is-invalid @enderror">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn-sena-pill d-inline-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill"></i> Guardar Cambios
                </button>
                <a href="{{ route('offers.index') }}" class="btn btn-outline-secondary rounded-pill px-3">Cancelar</a>
            </div>
        </form>
    </div>

</div>
@endsection