<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutriólogo El Misifu</title>
    
    <!-- Fuentes solicitadas -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Condensed:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="navbar">
        <div class="brand">
            <div class="logo-ellipse">logo</div>
            <h1 class="brand-title">nutriologo el misifu</h1>
        </div>
        <div>
            @yield('header_buttons')
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Botón flotante para Modo Oscuro -->
    <button id="dark-mode-toggle" class="btn dark-toggle-btn" title="Cambiar Tema">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
    </button>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>