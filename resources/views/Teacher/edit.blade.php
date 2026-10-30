@extends('layouts.app')

@section('title', 'Editar Instructor')

@section('content')
	<div class="container py-4">
		<h1 class="mb-4">Editar Instructor</h1>

		<div class="card shadow-sm border-0">
			<div class="card-body">
				<form action="{{ route('teacher.update', $teacher) }}" method="POST">
					@csrf
					@method('PUT')

					<label class="form-label">
						Nombre:
						<input type="text" name="name" class="form-control" value="{{ old('name', $teacher->name) }}">
					</label>

					<label class="form-label mt-3">
						Ubicación:
						<input type="text" name="location" class="form-control" value="{{ old('location', $teacher->location) }}">
					</label>

					<label for="area_id" class="form-label mt-3">Área</label>
					<select id="area_id" name="area_id" class="form-select" required>
						<option value="">Seleccione un área</option>
						@foreach ($areas as $area)
							<option value="{{ $area->id }}" @selected(old('area_id', $teacher->area_id) == $area->id)>{{ $area->name }}</option>
						@endforeach
					</select>

					<label for="training_center_id" class="form-label mt-3">Centro de formación</label>
					<select id="training_center_id" name="training_center_id" class="form-select" required>
						<option value="">Seleccione un centro</option>
						@foreach ($training_centers as $training_center)
							<option value="{{ $training_center->id }}" @selected(old('training_center_id', $teacher->training_center_id) == $training_center->id)>{{ $training_center->name }}</option>
						@endforeach
					</select>

					<button type="submit" class="btn btn-success mt-3">Actualizar instructor</button>
					<a href="{{ route('teacher.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
@endsection
