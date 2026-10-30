<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendiz Registrado</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <h1>Aprendiz Registrado</h1>
    <div>
        <p><strong>ID:</strong> {{ $apprentice->id }}</p>
        <p><strong>Nombre:</strong> {{ $apprentice->name }}</p>
        <p><strong>Correo:</strong> {{ $apprentice->email }}</p>
        <p><strong>Teléfono:</strong> {{ $apprentice->number }}</p>
        <p><strong>Curso ID:</strong> {{ $apprentice->course_id }}</p>
        <p><strong>Computador ID:</strong> {{ $apprentice->computer_id }}</p>
        <p><strong>Creado:</strong> {{ $apprentice->created_at }}</p>
    </div>
    <a href="{{ route('apprentice.create') }}">Volver al formulario</a>
</body>
</html>