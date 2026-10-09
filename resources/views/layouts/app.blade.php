<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin-SENA')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Fuentes Google (Inter / Open Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

 <style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc !important;
        color: #334155;
    }

    /* Quita el subrayado de todos los enlaces */
    a {
        text-decoration: none !important;
    }

    .btn-success {
        background-color: #39A900 !important;
        border-color: #39A900 !important;
    }

    .btn-success:hover {
        background-color: #2f8b00 !important;
        border-color: #2f8b00 !important;
    }

    .text-sena-blue {
        color: #00324D !important;
    }

    .text-sena-green {
        color: #39A900 !important;
    }

    .card {
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
    }
</style>

</head>
<body class="d-flex flex-column min-vh-100">

    <!-- 1. Barra de Navegación Superior -->
    @include('includes.navbar')

    <!-- 2. Contenido Dinámico de las Vistas -->
    <main class="grow py-4">
        @yield('content')
    </main>

    <!-- 3. Pie de Página Institucional -->
    @include('includes.footer')

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
    @stack('styles')

    
</body>
</html>