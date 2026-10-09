@extends('layouts.app')

@section('title', 'Gestión de Computadores - AdminSENA')

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
    .form-control:focus {
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
<div class="container-xl px-4" style="max-width: 1100px;">

    <div class="mb-4">
        <h2 class="fw-bold" style="color: #00324D;">Gestión de Computadores</h2>
        <p class="text-secondary small mb-0">Listado y administración de equipos registrados</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="form-sena-card overflow-hidden mb-5">
        <div class="px-4 py-3 border-bottom">
            <h5 class="fw-bold mb-0" style="color: #00324D;">Computadores registrados</h5>
        </div>
        <div class="p-0">
            @if($computers->isEmpty())
                <div class="text-center py-5 text-secondary">
                    <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                    <em>No hay computadores registrados aún.</em>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-sena align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="px-4 py-3" style="width: 80px;"># ID</th>
                                <th class="py-3">Número de Equipo</th>
                                <th class="py-3">Marca</th>
                                <th class="py-3 text-end px-4" style="width: 260px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($computers as $computer)
                                <tr>
                                    <td class="px-4 fw-semibold text-secondary">{{ $computer->id }}</td>
                                    <td class="fw-semibold" style="color: #00324D;">
                                        <i class="bi bi-laptop me-2 fs-5 align-middle" style="color: #39A900;"></i>
                                        <span>{{ $computer->name }}</span>
                                    </td>
                                    <td class="text-secondary">
                                        {{ $computer->brand ?? $computer->name ?? 'N/A' }}
                                    </td>
                                    <td class="text-end px-4">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <a href="{{ route('computer.show', $computer->id) }}" class="btn btn-sm btn-outline-primary btn-sena-outline d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-eye"></i> Mostrar
                                            </a>
                                            <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-sm btn-outline-success btn-sena-outline d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar este computador?');">
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

    <div class="form-sena-card p-4 p-md-5">
        <h5 class="fw-bold mb-4" style="color: #00324D;">Registrar nuevo computador</h5>

        <form action="{{ route('computer.store') }}" method="POST">
            @csrf

            <div class="row g-3" style="max-width: 600px;">
                <div class="col-12">
                    <label for="number" class="form-label small fw-bold text-secondary">Número de Equipo</label>
                    <input type="text"
                        name="name"
                        id="name"
                        class="form-control rounded-pill py-2 @error('name') is-invalid @enderror"
                        placeholder="Ej: EQ-001"
                        value="{{ old('name') }}"
                        required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="brand" class="form-label small fw-bold text-secondary">Marca del Computador</label>
                    <input type="text"
                        name="brand"
                        id="brand"
                        class="form-control rounded-pill py-2 @error('brand') is-invalid @enderror"
                        placeholder="Ej: Lenovo, HP, Asus..."
                        value="{{ old('brand') }}"
                        required>
                    @error('brand')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        </div>

            <button type="submit" class="btn-sena-pill mt-4 d-inline-flex align-items-center gap-2">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Guardar computador</span>
            </button>
        </form>
    </div>

</div>
@endsection