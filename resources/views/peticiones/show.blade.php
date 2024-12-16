@extends('layouts.admin')

@section('title', 'Detalle de la Petición')

@section('content')
    <style>
        .custom-img {
            max-height: 400px;

            display: block;
            margin: 0 auto;
        }
    </style>
    <div class="container my-5">
        <h1 class="text-center fw-bold">{{ $peticion->titulo }}</h1>

        <div class="card mt-4">
            <div class="card-body">
                <p><strong>Descripción:</strong> {{ $peticion->descripcion }}</p>
                <p><strong>Destinatario:</strong> {{ $peticion->destinatario }}</p>
                <p><strong>Categoría:</strong> {{ $peticion->categoria->nombre ?? 'No especificada' }}</p>
                <p><strong>Firmantes:</strong> {{ $peticion->firmantes }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($peticion->estado) }}</p>

                <!-- Imagen con tamaño controlado -->
                @if ($peticion->imagen && file_exists(public_path('storage/' . $peticion->imagen)))
                    <div class="text-center mt-3">
                        <img src="{{ asset('storage/' . $peticion->imagen) }}"
                             class="custom-img"
                             alt="Imagen de {{ $peticion->titulo }}">
                    </div>
                @else
                    <p class="text-danger">No hay imagen disponible.</p>
                @endif
            </div>

            <div class="card-footer text-muted text-center">
                Creada el {{ $peticion->created_at->format('d M Y') }}
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('adminpeticiones.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
