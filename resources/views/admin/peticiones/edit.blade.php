@extends('layouts.admin')

@section('title', 'Editar Petición')

@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold">Editar Petición</h1>

        <form action="{{ route('adminpeticiones.update', $peticion->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')

            <!-- Título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $peticion->titulo) }}" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required>{{ old('descripcion', $peticion->descripcion) }}</textarea>
            </div>

            <!-- Destinatario -->
            <div class="mb-3">
                <label for="destinatario" class="form-label">Destinatario</label>
                <input type="text" name="destinatario" id="destinatario" class="form-control" value="{{ old('destinatario', $peticion->destinatario) }}" required>
            </div>

            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-select">
                    <option value="" disabled>Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $peticion->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @if ($peticion->imagen && file_exists(public_path('storage/' . $peticion->imagen)))
                    <div class="mt-3">
                        <p>Imagen actual:</p>
                        <img src="{{ asset('storage/' . $peticion->imagen) }}" alt="Imagen de {{ $peticion->titulo }}" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <!-- Estado -->
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="pendiente" {{ $peticion->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="aceptada" {{ $peticion->estado == 'aceptada' ? 'selected' : '' }}>Aceptada</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('adminpeticiones.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
