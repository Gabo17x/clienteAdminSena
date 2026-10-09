<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Registrada</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <h1>Área Registrada</h1>
    <div>
        <p><strong>ID:</strong> {{ $area->id }}</p>
        <p><strong>Nombre:</strong> {{ $area->name }}</p>
        <p><strong>Creado:</strong> {{ $area->created_at }}</p>
    </div>
    <a href="{{ route('area.create') }}">Volver al formulario</a>
</body>
</html>