<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante LTGÜ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Carta de productos</h1>
        
        <!-- Buscador -->
        <form action="{{ route('carta') }}" method="GET" class="mb-4">
            <div class="input-group">
                <!-- Campo de búsqueda -->
                <input type="text" name="search" class="form-control" placeholder="Buscar producto..." value="{{ request('search') }}">

                <!-- Botón desplegable para elegir el tipo de búsqueda -->
                <select name="filter_type" class="form-select">
                    <option value="nombre" {{ request('filter_type') == 'nombre' ? 'selected' : '' }}>Buscar por Nombre</option>
                    <option value="Entrantes" {{ request('filter_type') == 'Entrantes' ? 'selected' : '' }}>Entrantes</option>
                    <option value="Platos principales" {{ request('filter_type') == 'Platos principales' ? 'selected' : '' }}>Platos Principales</option>
                    <option value="Bebidas" {{ request('filter_type') == 'Bebidas' ? 'selected' : '' }}>Bebidas</option>
                    <option value="Postres" {{ request('filter_type') == 'Postres' ? 'selected' : '' }}>Postres</option>
                </select>

                <!-- Botón de búsqueda -->
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
        
        <!-- Mostrar productos organizados por categoría -->
        @foreach($categorias as $categoria)
            <div class="mb-4">
                <h2 class="bg-secondary text-white p-2">{{ $categoria->nombre }}</h2>
                <div class="row">
                    @foreach($categoria->productos as $producto)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                    <p class="card-text">{{ $producto->descripcion }}</p>
                                    <p class="fw-bold">Precio: €{{ number_format($producto->precio, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>