@extends('layouts.app')

@section('title', 'Editar Área')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Editar Área</h1>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('area.update', $area) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label class="form-label">
                        Nombre:
                        <input type="text" name="name" class="form-control" value="{{ old('name', $area->name) }}">
                    </label>

                    <button type="submit" class="btn btn-success mt-3">Actualizar área</button>
                    <a href="{{ route('area.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
