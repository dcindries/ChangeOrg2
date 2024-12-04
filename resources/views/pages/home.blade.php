@extends('layouts.public')
@section('content')
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change.org Replica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center my-5">
    <h1 class="display-4">La plataforma mundial para el cambio</h1>
    <p class="lead">542,738,574 personas han pasado a la acción. ¡Victorias cada día!</p>
    <a href="#" class="btn btn-danger btn-lg">Inicia una petición</a>
</div>

<!-- Featured Section -->
<div class="container mb-5">
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/500x300" class="img-fluid rounded" alt="Petición destacada">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2 class="text-danger">Soy Mayor, NO idiota</h2>
            <p>Incrementemos el apoyo a las personas mayores. Firma para garantizar sus derechos.</p>
            <a href="#" class="btn btn-outline-danger">Ver más</a>
        </div>
    </div>
</div>

<!-- List of Petitions -->
<div class="container">
    <h3 class="mb-4">Mira lo que está pasando en Change.org</h3>
    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Petición 1">
                <div class="card-body">
                    <h5 class="card-title">Petición 1</h5>
                    <p class="card-text">Un cambio necesario para garantizar servicios médicos 24/7.</p>
                    <a href="#" class="btn btn-primary">Saber más</a>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Petición 2">
                <div class="card-body">
                    <h5 class="card-title">Petición 2</h5>
                    <p class="card-text">Garantiza servicios de cuidados paliativos 24/7 para los niños.</p>
                    <a href="#" class="btn btn-primary">Saber más</a>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Petición 3">
                <div class="card-body">
                    <h5 class="card-title">Petición 3</h5>
                    <p class="card-text">Muchos bienes con dueño no los necesitan. Ayúdanos a redistribuirlos.</p>
                    <a href="#" class="btn btn-primary">Saber más</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</html>>
@endsection
