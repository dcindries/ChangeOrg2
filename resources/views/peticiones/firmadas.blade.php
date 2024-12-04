@extends('layouts.public')

@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold">Peticiones Firmadas</h1>

        @if ($firmas->isEmpty())
            <div class="alert alert-info text-center mt-4">
                <p>No has firmado ninguna petición todavía.</p>
                <a href="{{ route('peticiones.index') }}" class="btn btn-primary">Explorar Peticiones</a>
            </div>
        @else
            <div class="row mt-4">
                @foreach ($firmas as $peticion)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if ($peticion->imagen)
                                <img src="{{ asset('storage/' . $peticion->imagen) }}" class="card-img-top" alt="Imagen de {{ $peticion->titulo }}">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Sin imagen disponible">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $peticion->titulo }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($peticion->descripcion, 100) }}</p>
                                <p><strong>Destinatario:</strong> {{ $peticion->destinatario }}</p>
                                <p><strong>Firmantes:</strong> {{ $peticion->firmantes }}</p>
                                <p><strong>Estado:</strong> {{ ucfirst($peticion->estado) }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <small>Creada el {{ $peticion->created_at->format('d M Y') }}</small>
                                <a href="{{ route('peticiones.show', $peticion->id) }}" class="btn btn-outline-primary btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
