@extends('layouts.public')

@section('content')
    <div class="container my-5">
        <h1 class="text-center fw-bold">Mis Peticiones</h1>

        @if($peticiones->isEmpty())
            <div class="alert alert-info text-center mt-4">
                <p>No tienes peticiones creadas actualmente.</p>
                <a href="{{ route('peticiones.create') }}" class="btn btn-primary">Crear una nueva petición</a>
            </div>
        @else
            <div class="row mt-4">
                @foreach ($peticiones as $peticion)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $peticion->titulo }}</h5>
                                @if ($peticion->imagen && file_exists(public_path('storage/' . $peticion->imagen)))
                                    <img src="{{ asset('storage/' . $peticion->imagen) }}" class="card-img-top" alt="Imagen de {{ $peticion->titulo }}">
                                @endif
                                <p class="card-text text-muted">{{ Str::limit($peticion->descripcion, 100) }}</p>
                                <p><strong>Destinatario:</strong> {{ $peticion->destinatario }}</p>
                                <p><strong>Firmantes:</strong> {{ $peticion->firmantes }}</p>
                                <p><strong>Estado:</strong> {{ ucfirst($peticion->estado) }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('peticiones.show', $peticion->id) }}" class="btn btn-outline-primary btn-sm">Ver más</a>
                                <form action="{{ route('peticiones.delete', $peticion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta petición?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
