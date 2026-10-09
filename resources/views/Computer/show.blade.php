<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computador Registrado</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <h1>Computador Registrado</h1>
    <div>
        <p><strong>ID:</strong> {{ $computer->id }}</p>
        <p><strong>Número:</strong> {{ $computer->name }}</p>
        <p><strong>Marca:</strong> {{ $computer->brand }}</p>
        <p><strong>Creado:</strong> {{ $computer->created_at }}</p>
    </div>
    <a href="{{ route('computer.create') }}">Volver al formulario</a>
</body>
</html>