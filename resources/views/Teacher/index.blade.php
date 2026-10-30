@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
            <div>
                <h4 class="fw-bold mb-0 text-dark">Instructores Registrados</h4>
                <p class="text-muted small mb-0">Gestión y administración del personal docente</p>
            </div>
            <a href="{{ route('teacher.create') }}" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-plus-lg me-1"></i> Nuevo Instructor
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-3">#</th>
                            <th>Nombre</th>
                            <th>Ubicacion</th>
                            <th class="text-end px-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teachers as $teacher)
                            <tr>
                                {{-- ID --}}
                                <td class="fw-semibold text-secondary px-3">{{ $teacher->id }}</td>

                                {{-- Nombre con Icono de Persona --}}
                                <td class="fw-semibold text-dark">
                                    <i class="bi bi-person text-success me-2"></i>{{ $teacher->name }}
                                </td>

                                {{-- Correo --}}
                                <td class="text-muted">
                                    <i class="bi bi-envelope text-primary me-1"></i>{{ $teacher->email ?? 'Sin correo' }}
                                </td>

                                {{-- Botones de Acción --}}
                                <td class="text-end px-3">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-sm btn-outline-primary">
                                            Mostrar
                                        </a>
                                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-outline-success">
                                            Editar
                                        </a>
                                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este instructor?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    No hay instructores registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection