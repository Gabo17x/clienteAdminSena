@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
	<div class="container py-4">
		<h1 class="mb-4">Editar Curso</h1>

		<div class="card shadow-sm border-0">
			<div class="card-body">
				<form action="{{ route('course.update', $course) }}" method="POST">
					@csrf
					@method('PUT')

					<label class="form-label">
						Número de curso:
						<input type="text" name="course_number" class="form-control" value="{{ old('course_number', $course->course_number) }}">
					</label>

					<label class="form-label mt-3">
						Día:
						<input type="text" name="day" class="form-control" value="{{ old('day', $course->day) }}">
					</label>

					<label for="area_id" class="form-label mt-3">Área</label>
					<select id="area_id" name="area_id" class="form-select" required>
						<option value="">Seleccione un área</option>
						@foreach ($areas as $area)
							<option value="{{ $area->id }}" @selected(old('area_id', $course->area_id) == $area->id)>{{ $area->name }}</option>
						@endforeach
					</select>

					<label for="training_center_id" class="form-label mt-3">Centro de formación</label>
					<select id="training_center_id" name="training_center_id" class="form-select" required>
						<option value="">Seleccione un centro</option>
						@foreach ($training_centers as $training_center)
							<option value="{{ $training_center->id }}" @selected(old('training_center_id', $course->training_center_id) == $training_center->id)>{{ $training_center->name }}</option>
						@endforeach
					</select>

					<button type="submit" class="btn btn-success mt-3">Actualizar curso</button>
					<a href="{{ route('course.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
@endsection
