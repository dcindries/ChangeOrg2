@extends('layouts.public')
@section('content')
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Petición - Change.org</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<!-- Formulario -->
<div class="container my-5">
    <h1 class="text-center mb-4">Inicia tu petición</h1>
    <p class="text-center text-muted mb-4">Llena el siguiente formulario para crear tu petición</p>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('peticiones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Protege contra ataques CSRF -->

                <!-- Campo: Título -->
                <div class="mb-3">
                    <label for="titulo" class="form-label fw-bold">Título de la petición</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe un título llamativo" required>
                    @error('titulo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo: Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="6" placeholder="Explica los detalles de tu petición" required></textarea>
                    @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo: Destinatario -->
                <div class="mb-3">
                    <label for="destinatario" class="form-label fw-bold">Destinatario</label>
                    <input type="text" class="form-control" id="destinatario" name="destinatario" placeholder="¿A quién va dirigida la petición?" required>
                    @error('destinatario')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo: Categoría -->
                <div class="mb-3">
                    <label for="categoria_id" class="form-label fw-bold">Categoría</label>
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                        <option value="" selected disabled>Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="imagen" class="form-label fw-bold">Imagen de la petición</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger w-100">Crear petición</button>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
