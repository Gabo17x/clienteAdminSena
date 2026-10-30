@extends('layouts.app')

@section('title', 'Gestión de Ambientes - AdminSENA')

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
    .form-control:focus,
    .form-select:focus {
        border-color: #39A900;
        box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15);
    }
    .table-sena thead th {
        background-color: #00324D;
        color: #ffffff;
        border: none;
    }
    .badge-disponible { background-color: #39A900; }
    .badge-ocupado { background-color: #dc3545; }
    .badge-mantenimiento { background-color: #ffc107; color: #00324D; }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 1100px;">

    <div class="mb-4">
        <h2 class="fw-bold" style="color: #00324D;">Gestión de Ambientes</h2>
        <p class="text-secondary small mb-0">Listado y administración de salones, aulas y laboratorios</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <!-- Listado -->
    <div class="form-sena-card overflow-hidden mb-5">
        <div class="px-4 py-3 border-bottom">
            <h5 class="fw-bold mb-0" style="color: #00324D;">Ambientes registrados</h5>
        </div>
        <div class="p-0">
            @if($ambients->isEmpty())
                <div class="text-center py-5 text-secondary">
                    <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                    <em>No hay ambientes registrados aún.</em>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-sena align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="px-4 py-3" style="width: 80px;"># ID</th>
                                <th class="py-3">Número</th>
                                <th class="py-3">Capacidad</th>
                                <th class="py-3">Tipo</th>
                                <th class="py-3">Centro de Formación</th>
                                <th class="py-3">Área</th>
                                <th class="py-3">Estado</th>
                                <th class="py-3 text-end px-4" style="width: 220px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambients as $ambient)
                                <tr>
                                    <td class="px-4 fw-semibold text-secondary">{{ $ambient->id }}</td>
                                    <td class="fw-semibold" style="color: #00324D;">
                                        <i class="bi bi-door-open-fill me-2" style="color: #39A900;"></i>
                                        {{ $ambient->number }}
                                    </td>
                                    <td class="text-secondary">{{ $ambient->capacity }} personas</td>
                                    <td class="text-secondary text-capitalize">{{ $ambient->type }}</td>
                                    <td class="text-secondary">{{ $ambient->trainingCenter->name ?? 'N/A' }}</td>
                                    <td class="text-secondary">{{ $ambient->area->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge rounded-pill badge-{{ $ambient->status }} text-capitalize">
                                            {{ $ambient->status }}
                                        </span>
                                    </td>
                                    <td class="text-end px-4">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <a href="{{ route('ambients.edit', $ambient->id) }}" class="btn btn-sm btn-outline-success btn-sena-outline d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <form action="{{ route('ambients.destroy', $ambient->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar este ambiente?');">
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

    <!-- Formulario de registro -->
    <div class="form-sena-card p-4 p-md-5">
        <h5 class="fw-bold mb-4" style="color: #00324D;">Registrar nuevo ambiente</h5>

        <form action="{{ route('ambients.store') }}" method="POST">
            @csrf

            <div class="row g-3" style="max-width: 700px;">

                <div class="col-md-6">
                    <label for="number" class="form-label small fw-bold text-secondary">Número / Nombre del Ambiente</label>
                    <input type="text"
                           name="number"
                           id="number"
                           class="form-control rounded-pill py-2 @error('number') is-invalid @enderror"
                           placeholder="Ej: A-101, Lab-3..."
                           value="{{ old('number') }}"
                           required>
                    @error('number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="capacity" class="form-label small fw-bold text-secondary">Capacidad</label>
                    <input type="number"
                           name="capacity"
                           id="capacity"
                           min="1"
                           class="form-control rounded-pill py-2 @error('capacity') is-invalid @enderror"
                           placeholder="Ej: 30"
                           value="{{ old('capacity') }}"
                           required>
                    @error('capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label small fw-bold text-secondary">Tipo</label>
                    <select name="type" id="type" class="form-select rounded-pill py-2 @error('type') is-invalid @enderror" required>
                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>Selecciona un tipo</option>
                        <option value="aula" {{ old('type') == 'aula' ? 'selected' : '' }}>Aula</option>
                        <option value="laboratorio" {{ old('type') == 'laboratorio' ? 'selected' : '' }}>Laboratorio</option>
                        <option value="taller" {{ old('type') == 'taller' ? 'selected' : '' }}>Taller</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label small fw-bold text-secondary">Estado</label>
                    <select name="status" id="status" class="form-select rounded-pill py-2 @error('status') is-invalid @enderror" required>
                        <option value="" disabled {{ old('status') ? '' : 'selected' }}>Selecciona un estado</option>
                        <option value="disponible" {{ old('status') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="ocupado" {{ old('status') == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                        <option value="mantenimiento" {{ old('status') == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="training_center_id" class="form-label small fw-bold text-secondary">Centro de Formación</label>
                    <select name="training_center_id" id="training_center_id" class="form-select rounded-pill py-2 @error('training_center_id') is-invalid @enderror">
                        <option value="">Sin asignar</option>
                        @foreach ($trainingCenters as $center)
                            <option value="{{ $center->id }}" {{ old('training_center_id') == $center->id ? 'selected' : '' }}>
                                {{ $center->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('training_center_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="area_id" class="form-label small fw-bold text-secondary">Área</label>
                    <select name="area_id" id="area_id" class="form-select rounded-pill py-2 @error('area_id') is-invalid @enderror">
                        <option value="">Sin asignar</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                {{ $area->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn-sena-pill mt-4 d-inline-flex align-items-center gap-2">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Guardar ambiente</span>
            </button>
        </form>
    </div>

</div>
@endsection