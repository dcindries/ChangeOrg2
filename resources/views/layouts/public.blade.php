<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Change.org')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
<!-- Navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Change.org</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Enlaces comunes -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('peticiones.index') }}">Inicio</a>
                </li>
                @auth
                    <!-- Enlaces para usuarios autenticados -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peticiones.mine') }}">Mis peticiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peticiones.create') }}">Crear petición</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peticiones.firmadas') }}">Peticiones firmadas</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="nav-link btn btn-link" type="submit">Cerrar sesión</button>
                        </form>
                    </li>
                @else
                    <!-- Enlaces para usuarios no autenticados -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registro</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido dinámico -->
<main class="py-4">
    @yield('content')
</main>

<!-- Pie de página -->
<footer class="bg-dark text-light text-center py-4">
    <div class="container">
        <p>&copy; {{ date('Y') }} Change.org | Plataforma para el cambio</p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
