@extends('layouts.app')

@section('title', 'Ambientes - AdminSENA')

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

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold" style="color: #00324D;">Gestión de Ambientes</h2>
            <p class="text-secondary small mb-0">Listado y administración de salones, aulas y laboratorios</p>
        </div>
        <a href="{{ route('ambients.create') }}" class="btn-sena-pill d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-circle-fill"></i> Nuevo ambiente
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

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
                                <th class="py-3 text-end px-4" style="width: 260px;">Acciones</th>
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
                                            <a href="{{ route('ambients.show', $ambient->id) }}" class="btn btn-sm btn-outline-primary btn-sena-outline d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-eye"></i> Mostrar
                                            </a>
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

</div>
@endsection