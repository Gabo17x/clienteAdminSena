@extends('layouts.app')

@section('title', 'Cursos - AdminSENA')

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
    .btn-sena-outline {
        border-radius: 9999px;
        font-weight: 600;
        padding: 0.4rem 1rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #39A900;
        box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15);
    }
    .table-sena thead th {
        background-color: #00324D;
        color: #ffffff;
        border: none;
    }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 1150px;">

    {{-- Encabezado --}}
    <div class="mb-4">
        <h2 class="fw-bold" style="color: #00324D;">Cursos</h2>
        <p class="text-secondary small mb-0">Gestión y registro de cursos de formación</p>
    </div>

    {{-- Alerta de éxito --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Tabla de cursos registrados --}}
    <div class="form-sena-card overflow-hidden mb-5">
        <div class="px-4 py-3 border-bottom">
            <h5 class="fw-bold mb-0" style="color: #00324D;">Cursos registrados</h5>
        </div>
        <div class="p-0">
            @if($courses->isEmpty())
                <div class="text-center py-5 text-secondary">
                    <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                    <em>No hay cursos registrados aún.</em>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-sena align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="px-4 py-3" style="width: 70px;">#</th>
                                <th class="py-3">Número de curso</th>
                                <th class="py-3">Día</th>
                                <th class="py-3">Área</th>
                                <th class="py-3">Centro</th>
                                <th class="py-3 text-end px-4" style="width: 260px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="px-4 fw-semibold text-secondary">{{ $course->id }}</td>
                                    <td class="fw-semibold" style="color: #00324D;">
                                        <i class="bi bi-mortarboard me-2 fs-5 align-middle" style="color: #39A900;"></i>
                                        <span>{{ $course->course_number ?? $course->name ?? $course->id }}</span>
                                    </td>
                                    <td class="text-secondary">
                                        {{ $course->day ?? 'N/A' }}
                                    </td>
                                    <td class="text-secondary">
                                        @php
                                            $areaItem = isset($areas) ? $areas->firstWhere('id', $course->area_id) : null;
                                        @endphp
                                        {{ $areaItem ? $areaItem->name : 'Sin área' }}
                                    </td>
                                    <td class="text-secondary">
                                        @php
                                            $centerItem = isset($training_centers) ? $training_centers->firstWhere('id', $course->training_center_id) : null;
                                        @endphp
                                        {{ $centerItem ? $centerItem->name : 'Sin centro' }}
                                    </td>
                                    <td class="text-end px-4">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-outline-primary btn-sena-outline d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-eye"></i> Mostrar
                                            </a>
                                            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-outline-success btn-sena-outline d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar este curso?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-sena-outline d-inline-flex align-items-center gap-1" title="Eliminar">
                                                    <i class="bi bi-trash3"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- Formulario Crear Nuevo Curso --}}
    <div class="form-sena-card p-4 p-md-5">
        <h5 class="fw-bold mb-4" style="color: #00324D;">Crear nuevo curso</h5>

        <form action="{{ route('course.store') }}" method="POST">
            @csrf

            <div class="row g-3" style="max-width: 800px;">
                <div class="col-md-6">
                    <label for="course_number" class="form-label small fw-bold text-secondary">Número de curso</label>
                    <input type="text"
                           name="course_number"
                           id="course_number"
                           class="form-control rounded-pill py-2 @error('course_number') is-invalid @enderror"
                           placeholder="Ej: 3223899"
                           value="{{ old('course_number') }}"
                           required>
                    @error('course_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="day" class="form-label small fw-bold text-secondary">Día / Jornada</label>
                    <input type="text"
                           name="day"
                           id="day"
                           class="form-control rounded-pill py-2 @error('day') is-invalid @enderror"
                           placeholder="Ej: Diurna, Tarde, Noche"
                           value="{{ old('day') }}"
                           required>
                    @error('day')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-secondary" for="area_id">Área</label>
                    <select name="area_id" id="area_id" class="form-select rounded-pill py-2 @error('area_id') is-invalid @enderror" required>
                        <option value="">Seleccione un área</option>
                        @if(isset($areas))
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                    {{ $area->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('area_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-secondary" for="training_center_id">Centro de Formación</label>
                    <select name="training_center_id" id="training_center_id" class="form-select rounded-pill py-2 @error('training_center_id') is-invalid @enderror" required>
                        <option value="">Seleccione un centro de formación</option>
                        @if(isset($training_centers))
                            @foreach($training_centers as $training_center)
                                <option value="{{ $training_center->id }}" {{ old('training_center_id') == $training_center->id ? 'selected' : '' }}>
                                    {{ $training_center->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('training_center_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-sena-pill mt-4 d-inline-flex align-items-center gap-2">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Guardar curso</span>
            </button>
        </form>
    </div>

</div>
@endsection