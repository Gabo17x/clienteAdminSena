@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Editar</h1>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('apprentice.update', $apprentice) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label class="form-label">
                        Nombre:
                        <input type="text" name="name" class="form-control" value="{{ old('name', $apprentice->name) }}">
                    </label>

                    <label class="form-label mt-3">
                        Email:
                        <input type="email" name="email" class="form-control" value="{{ old('email', $apprentice->email) }}">
                    </label>

                    <label class="form-label mt-3">
                        Número:
                        <input type="text" name="number" class="form-control" value="{{ old('number', $apprentice->number) }}">
                    </label>

                    <label for="course_id" class="form-label mt-3">Curso</label>
                    <select id="course_id" name="course_id" class="form-select">
                        <option value="">Sin curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" @selected(old('course_id', $apprentice->course_id) == $course->id)>
                                {{ $course->name ?? $course->course_number ?? 'Curso #' . $course->id }}
                            </option>
                        @endforeach
                    </select>

                    <label for="computer_id" class="form-label mt-3">Computador</label>
                    <select id="computer_id" name="computer_id" class="form-select">
                        <option value="">Sin computador</option>
                        @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" @selected(old('computer_id', $apprentice->computer_id) == $computer->id)>
                                Equipo #{{ $computer->id }}{{ $computer->brand ? ' - ' . $computer->brand : '' }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success mt-3">Actualizar aprendiz</button>
                    <a href="{{ route('apprentice.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection