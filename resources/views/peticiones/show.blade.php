@extends('layouts.public')

@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold">{{ $peticion->titulo }}</h1>
        <div class="card mt-4">
            <div class="card-body">
                <p class="fw-bold">Descripción:</p>
                <p>{{ $peticion->descripcion }}</p>

                <p><strong>Destinatario:</strong> {{ $peticion->destinatario }}</p>
                <p><strong>Categoría:</strong> {{ $peticion->categoria->nombre ?? 'No especificada' }}</p>
                <p><strong>Firmantes:</strong> {{ $peticion->firmantes }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($peticion->estado) }}</p>

                @if ($peticion->imagen && file_exists(public_path('storage/' . $peticion->imagen)))
                    <img src="{{ asset('storage/' . $peticion->imagen) }}" class="card-img-top" alt="Imagen de {{ $peticion->titulo }}">
                @else
                    <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Imagen por defecto">
                @endif

            </div>
            <div class="card-footer text-muted">
                <small>Creada el {{ $peticion->created_at->format('d M Y') }}</small>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('peticiones.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
