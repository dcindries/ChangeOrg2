@extends('layouts.admin')

@section('title', 'Gestión de Peticiones')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center fw-bold">Gestión de Peticiones</h1>

        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Firmantes</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($peticiones as $peticion)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peticion->titulo }}</td>
                        <td>{{ Str::limit($peticion->descripcion, 50) }}</td>
                        <td>{{ $peticion->firmantes }}</td>
                        <td>
                            <span class="badge {{ $peticion->estado == 'pendiente' ? 'bg-warning' : 'bg-success' }}">
                                {{ ucfirst($peticion->estado) }}
                            </span>
                        </td>
                        <td>
                            <!-- Botón Ver -->
                            <a href="{{ route('adminpeticiones.show', $peticion->id) }}" class="btn btn-primary btn-sm">Ver</a>

                            <!-- Botón Editar -->
                            <a href="{{ route('adminpeticiones.edit', $peticion->id) }}" class="btn btn-success btn-sm">Editar</a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('adminpeticiones.delete', $peticion->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta petición?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay peticiones disponibles.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
