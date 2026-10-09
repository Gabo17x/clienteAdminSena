@extends('layouts.app')

@section('title', 'Editar Centro de Formación')

@section('content')
	<div class="container py-4">
		<h1 class="mb-4">Editar Centro de Formación</h1>

		<div class="card shadow-sm border-0">
			<div class="card-body">
				<form action="{{ route('training_center.update', $training_center) }}" method="POST">
					@csrf
					@method('PUT')

					<label class="form-label">
						Nombre:
						<input type="text" name="name" class="form-control" value="{{ old('name', $training_center->name) }}">
					</label>

					<label class="form-label mt-3">
						Ubicación:
						<input type="text" name="location" class="form-control" value="{{ old('location', $training_center->location) }}">
					</label>

					<button type="submit" class="btn btn-success mt-3">Actualizar centro</button>
					<a href="{{ route('training_center.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
@endsection
