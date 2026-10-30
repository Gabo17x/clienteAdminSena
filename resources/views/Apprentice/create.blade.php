@extends('layouts.app')

@section('title', 'Registrar Aprendiz | AdminSENA')

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
    .table-sena {
        min-width: 850px;
    }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 1150px;">

    {{-- Encabezado --}}
    <div class="mb-4">
        <h2 class="fw-bold" style="color: #00324D;">Registrar Aprendiz</h2>
        <p class="text-secondary small mb-0">Completa la información para agregar un nuevo aprendiz al sistema.</p>
    </div>

    {{-- Alerta de éxito --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Alerta de error --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>Revisa los campos marcados para continuar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 mb-5">
        <div class="card-header bg-white border-bottom py-3">
            <h5 class="fw-bold mb-0" style="color: #00324D;">Aprendices guardados</h5>
        </div>
        <div class="card-body p-0">
            @if ($apprentices->isEmpty())
                <div class="text-center text-secondary py-5">
                    <i class="bi bi-people fs-1 d-block mb-2"></i>
                    Todavía no hay aprendices registrados.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-sena table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="px-4 py-3">Nombre</th>
                                <th class="py-3">Correo</th>
                                <th class="py-3">Documento</th>
                                <th class="py-3">Curso</th>
                                <th class="py-3">Computador</th>
                                <th class="py-3 text-end px-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apprentices as $apprentice)
                                <tr>
                                    <td class="px-4 fw-semibold text-dark">{{ $apprentice->name }}</td>
                                    <td class="text-secondary">{{ $apprentice->email }}</td>
                                    <td class="text-secondary">{{ $apprentice->number }}</td>
                                    <td class="text-secondary">{{ $apprentice->course?->course_number ?? 'Sin curso' }}</td>
                                    <td class="text-secondary">
                                        {{ $apprentice->computer ? ($apprentice->computer->brand ?? 'Equipo') . ' #' . $apprentice->computer->id : 'Sin computador' }}
                                    </td>
                                    <td class="text-end px-4">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('apprentice.edit', $apprentice) }}" class="btn btn-sm btn-outline-success" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('apprentice.destroy', $apprentice) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Deseas eliminar este aprendiz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                    <i class="bi bi-trash3"></i>
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

    {{-- Formulario Registrar Aprendiz --}}
    <div class="form-sena-card p-4 p-md-5">
        <h5 class="fw-bold mb-4" style="color: #00324D;">Datos del aprendiz</h5>

        <form method="POST" action="{{ route('apprentice.store') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label small fw-bold text-secondary">Nombre completo</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="form-control rounded-pill py-2 @error('name') is-invalid @enderror"
                           placeholder="Ej: Ana Pérez" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label small fw-bold text-secondary">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="form-control rounded-pill py-2 @error('email') is-invalid @enderror"
                           placeholder="aprendiz@correo.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="number" class="form-label small fw-bold text-secondary">Número de documento</label>
                    <input type="number" name="number" id="number" value="{{ old('number') }}"
                           class="form-control rounded-pill py-2 @error('number') is-invalid @enderror"
                              placeholder="Ej: 1006543210" required>
                    @error('number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="course_id" class="form-label small fw-bold text-secondary">Curso</label>
                    <select name="course_id" id="course_id" class="form-select rounded-pill py-2 @error('course_id') is-invalid @enderror">
                        <option value="">Seleccione un curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->name ?? $course->course_number ?? 'Curso #' . $course->id }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="computer_id" class="form-label small fw-bold text-secondary">Computador asignado</label>
                    <select name="computer_id" id="computer_id" class="form-select rounded-pill py-2 @error('computer_id') is-invalid @enderror">
                        <option value="">Sin computador asignado</option>
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>
                                Equipo #{{ $computer->id }}{{ $computer->brand ? ' - ' . $computer->brand : '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('computer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4 pt-3 border-top">
                <button type="submit" class="btn-sena-pill d-inline-flex align-items-center gap-2">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Guardar aprendiz</span>
                </button>
               
            </div>
        </form>
    </div>

</div>
@endsection