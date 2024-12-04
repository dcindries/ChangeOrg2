@extends('layouts.public')

@section('title', 'Inicio')

@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold">Todas las Peticiones</h1>
        <div class="row mt-4">
            @forelse ($peticiones as $peticion)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">


                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $peticion->titulo }}</h5>
                            @if ($peticion->imagen && file_exists(public_path('storage/' . $peticion->imagen)))
                                <img src="{{ asset('storage/' . $peticion->imagen) }}" class="card-img-top" alt="Imagen de {{ $peticion->titulo }}">
                            @endif
                            <p class="card-text text-muted">{{ Str::limit($peticion->descripcion, 100) }}</p>
                            <p class="text-muted"><strong>Destinatario:</strong> {{ $peticion->destinatario }}</p>
                            <p class="text-muted"><strong>Firmantes:</strong> {{ $peticion->firmantes }}</p>
                            @if (Auth::check())
                                @if (!$peticion->firmas->contains(Auth::user()))
                                    <form action="{{ route('peticiones.firmar', $peticion->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Firmar</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>Ya firmado</button>
                                @endif
                            @else
                                <p class="text-muted">Debes iniciar sesión para firmar esta petición.</p>
                            @endif

                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between">
                            <small>Creada el {{ $peticion->created_at->format('d M Y') }}</small>
                            <a href="{{ route('peticiones.show', $peticion->id) }}" class="btn btn-outline-primary btn-sm">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">No hay peticiones disponibles.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
