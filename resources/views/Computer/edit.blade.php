@extends('layouts.app')

@section('title', 'Editar Computador')

@section('content')
	<div class="container py-4">
		<h1 class="mb-4">Editar Computador</h1>

		<div class="card shadow-sm border-0">
			<div class="card-body">
				<form action="{{ route('computer.update', $computer) }}" method="POST">
					@csrf
					@method('PUT')

					<label class="form-label">
						Número:
						<input type="text" name="name" class="form-control" value="{{ old('name', $computer->name) }}" required>
					</label>

					<label class="form-label mt-3">
						Marca:
						<input type="text" name="brand" class="form-control" value="{{ old('brand', $computer->brand) }}" required>
					</label>

					<button type="submit" class="btn btn-success mt-3">Actualizar computador</button>
					<a href="{{ route('computer.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
@endsection
