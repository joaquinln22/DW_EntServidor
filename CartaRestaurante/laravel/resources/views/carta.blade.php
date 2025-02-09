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

        <!-- Sección de Anuncios Activos -->
        @if($anuncios->count() > 0)
            <div class="alert alert-warning text-center">
                <h4 class="mb-3">📢 Anuncios Activos</h4>
                @foreach($anuncios as $anuncio)
                    <div class="border p-2 mb-2">
                        <h5 class="fw-bold">{{ $anuncio->titulo }}</h5>
                        <p>{{ $anuncio->mensaje }}</p>
                        <small class="text-muted">Válido hasta: {{ $anuncio->fecha_fin }}</small>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Buscador -->
        <form id="searchForm" class="mb-4">
            <div class="input-group">
                <!-- Campo de búsqueda -->
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar producto..." value="">

                <!-- Botón desplegable para elegir el tipo de búsqueda -->
                <select id="filterType" class="form-select">
                    <option value="nombre">Buscar por nombre</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ Str::slug($categoria->nombre) }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>

                <!-- Botón de búsqueda -->
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
        
        <!-- Mostrar productos organizados por categoría -->
        @foreach($categorias as $categoria)
            <div class="mb-4">
                <h2 id="{{ Str::slug($categoria->nombre) }}" class="bg-secondary text-white p-2">{{ $categoria->nombre }}</h2>
                <div class="row">
                    @foreach($categoria->productos as $producto)
                        <div class="col-md-4 mb-3">
                            <div class="card" id="{{ Str::slug($producto->nombre) }}">
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
    
    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita recargar la página
            
            let searchQuery = document.getElementById('searchInput').value.toLowerCase().trim();
            let filterType = document.getElementById('filterType').value;

            function normalizeText(text) {
                return text
                    .normalize("NFD") // Descompone caracteres acentuados
                    .replace(/[\u0300-\u036f]/g, "") // Elimina los acentos
                    .replace(/\s+/g, '-') // Reemplaza espacios por guiones
                    .toLowerCase(); // Convierte todo a minúsculas
            }

            if (filterType === 'nombre' && searchQuery !== '') {
                // Buscar el producto por nombre
                let productElement = document.getElementById(normalizeText(searchQuery));
                if (productElement) {
                    productElement.scrollIntoView({ behavior: 'smooth' });
                } else {
                    alert('Producto no encontrado');
                }
            } else {
                // Buscar por categoría
                let categoryElement = document.getElementById(filterType);
                if (categoryElement) {
                    categoryElement.scrollIntoView({ behavior: 'smooth' });
                } else {
                    alert('Categoría no encontrada');
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>