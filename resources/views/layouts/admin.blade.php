<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administrador')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-danger text-white p-4" style="min-width: 200px; height: 100vh;">
        <h3 class="mb-4">Admin Panel</h3>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="{{ route('adminpeticiones.index') }}" class="nav-link text-white">Peticiones</a></li>
        </ul>
    </div>
    <!-- Contenido principal -->
    <div class="p-4" style="flex: 1;">
        @yield('content')
    </div>
</div>
</body>
</html>
