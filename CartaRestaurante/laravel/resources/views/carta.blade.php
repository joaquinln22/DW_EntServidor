<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante LTGÜ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fondo de la página */
        body {
            background-image: url("{{ asset('storage/background.jpg') }}");
            background-position: center;
            background-repeat: repeat;
            background-attachment: fixed;
        }

        /* Contenedor del título centrado */
        .title-container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: rgb(91, 35, 203);
            width: 50%;
            border-radius: 10px;
            margin: 0 auto; /* Centrado en la página */
            padding: 10px;
        }

        h1 {
            font-size: 40px;
            color: white;
            margin: 0;
        }

        h2 {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 50%;
            border-radius: 10px;
            margin: 0 auto; /* Centrado en la página */
            padding: 10px;
        }

        /* Estilos para el buscador */
        .search-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            background-color: rgba(91, 35, 203, 0.8);
            padding: 15px;
            border-radius: 10px;
        }

        /* Estilos de las tarjetas de productos */
        .card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            height: 100%; /* Tarjetas con altura uniforme */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: scale(1.05);
        }

        /* Ajustar el tamaño de todas las imágenes */
        .card-img-top {
            width: 100%;
            height: 380px; /* Altura fija para todas las imágenes */
            object-fit: cover; /* Ajusta la imagen dentro de su contenedor */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Ocultar elementos dinámicamente */
        .hidden {
            display: none !important;
        }

        /* Carousel de Anuncios */
        .carousel-container {
            max-width: 800px;
            margin: 20px auto;
        }
        .carousel-item {
            background-color:rgba(255, 193, 7, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .carousel-control-prev, .carousel-control-next {
            filter: invert(100%);
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        
        <!-- Título centrado -->
        <div class="title-container">
            <h1 class="text-center">Carta de productos</h1>
        </div>
        
        <!-- Carousel de Anuncios -->
        @if($anuncios->count() > 0)
            <div id="anunciosCarousel" class="carousel slide carousel-container" data-bs-ride="carousel">
                
                <!-- Contenedor de los anuncios -->
                <div class="carousel-inner">
                    @foreach($anuncios as $index => $anuncio)
                        <!-- La primera diapositiva debe ser "activa" para que se muestre al cargar la página -->
                        <div class="carousel-item @if($index == 0) active @endif">
                            <h4 class="fw-bold text-center">📢 {{ $anuncio->titulo }}</h4>
                            <p class="text-center">{{ $anuncio->mensaje }}</p>
                            <small class="text-muted text-center d-block">Válido hasta: {{ $anuncio->fecha_fin }}</small>
                        </div>
                    @endforeach
                </div>

                <!-- Botón para ir al anuncio anterior -->
                <button class="carousel-control-prev" type="button" data-bs-target="#anunciosCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>

                <!-- Botón para ir al siguiente anuncio -->
                <button class="carousel-control-next" type="button" data-bs-target="#anunciosCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>

            </div>
        @endif

        <!-- Buscador -->
        <form id="searchForm" class="search-container mb-4">
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Buscar producto...">
            <select id="filterType" class="form-select mx-2">
                <option value="nombre">Buscar por nombre</option>
                @foreach($categorias as $categoria)
                    <option value="{{ Str::slug($categoria->nombre) }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-warning">Buscar</button>
        </form>

        <!-- Mostrar productos organizados por categoría -->
        @foreach($categorias as $categoria)
            <div class="categoria-container mb-4" data-categoria="{{ Str::slug($categoria->nombre) }}">
                <h2 id="{{ Str::slug($categoria->nombre) }}" class="bg-warning">{{ $categoria->nombre }}</h2>
                <div class="row mt-4">
                    @foreach($categoria->productos as $producto)
                        <div class="col-md-4 mb-3 producto-card" data-nombre="{{ Str::slug($producto->nombre) }}" data-categoria="{{ Str::slug($categoria->nombre) }}">
                            <div class="card">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top img-fluid" alt="{{ $producto->nombre }}">
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
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .replace(/\s+/g, '-')
                    .toLowerCase();
            }

            let productos = document.querySelectorAll('.producto-card');
            let categorias = document.querySelectorAll('.categoria-container');

            if (searchQuery === "" && filterType === "nombre") {
                // Mostrar todo si la búsqueda está vacía
                productos.forEach(p => p.classList.remove('hidden'));
                categorias.forEach(c => c.classList.remove('hidden'));
                return;
            }

            if (filterType === "nombre") {
                // Buscar producto y ocultar los demás
                productos.forEach(producto => {
                    let nombre = producto.getAttribute("data-nombre");
                    if (nombre.includes(normalizeText(searchQuery))) {
                        producto.classList.remove("hidden");
                    } else {
                        producto.classList.add("hidden");
                    }
                });

                // Ocultar categorías sin productos visibles
                categorias.forEach(categoria => {
                    let productosVisibles = categoria.querySelectorAll(".producto-card:not(.hidden)").length;
                    if (productosVisibles === 0) {
                        categoria.classList.add("hidden");
                    } else {
                        categoria.classList.remove("hidden");
                    }
                });

            } else {
                // Mostrar solo la categoría seleccionada con todos sus productos
                categorias.forEach(categoria => {
                    if (categoria.getAttribute("data-categoria") === filterType) {
                        categoria.classList.remove("hidden");
                        categoria.querySelectorAll('.producto-card').forEach(producto => {
                            producto.classList.remove("hidden");
                        });
                    } else {
                        categoria.classList.add("hidden");
                        categoria.querySelectorAll('.producto-card').forEach(producto => {
                            producto.classList.add("hidden");
                        });
                    }
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>