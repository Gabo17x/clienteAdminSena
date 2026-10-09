<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Registrado</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <h1>Centro de Formación Registrado</h1>
    <div>
        <p><strong>ID:</strong> {{ $training_center->id }}</p>
        <p><strong>Nombre:</strong> {{ $training_center->name }}</p>
        <p><strong>Ubicación:</strong> {{ $training_center->location }}</p>
        <p><strong>Creado:</strong> {{ $training_center->created_at }}</p>
    </div>
    <a href="{{ route('training_center.create') }}">Volver al formulario</a>
</body>
</html>