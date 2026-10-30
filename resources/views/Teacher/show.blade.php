<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Registrado</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <h1>Instructor Registrado</h1>
    <div>
        <p><strong>ID:</strong> {{ $teacher->id }}</p>
        <p><strong>Nombre:</strong> {{ $teacher->name }}</p>
        <p><strong>Ubicación:</strong> {{ $teacher->location }}</p>
        <p><strong>Área:</strong> {{ $teacher->area?->name ?? 'Sin área' }}</p>
        <p><strong>Centro de formación:</strong> {{ $teacher->trainingCenter?->name ?? 'Sin centro' }}</p>
        <p><strong>Creado:</strong> {{ $teacher->created_at }}</p>
    </div>
    <a href="{{ route('teacher.create') }}">Volver al formulario</a>
</body>
</html>