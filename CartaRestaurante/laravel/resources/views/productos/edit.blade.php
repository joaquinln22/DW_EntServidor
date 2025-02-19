<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Transición para una transición más fluida */
        body {
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            max-width: 600px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control, .form-select {
            border: none;
        }

        .img-thumbnail {
            max-height: 200px;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }

        /* Modo Claro */
        @media (prefers-color-scheme: light) {
            body {
                background-color: #f8f9fa;
                color: black;
            }

            .container {
                background-color: #ffffff;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            .form-control, .form-select {
                background-color: white;
                color: black;
                border: 1px solid #ced4da;
            }

            .form-control::placeholder {
                color: #6c757d;
            }

            .btn-primary {
                background-color: #007bff;
                color: white;
            }

            .btn-secondary {
                background-color: #6c757d;
                color: white;
            }

            .btn-danger {
                background-color: #dc3545;
                color: white;
            }

            .alert {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
        }

        /* Modo Oscuro */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #111827;
                color: white;
            }

            .container {
                background-color: #1F2937;
            }

            .form-control, .form-select {
                background-color: #374151;
                color: white;
            }

            .form-control::placeholder {
                color: #9CA3AF;
            }

            .btn-primary {
                background-color: #2563EB;
                color: white;
            }

            .btn-secondary {
                background-color: #4B5563;
                color: white;
            }

            .btn-danger {
                background-color: #EF4444;
                color: white;
            }

            .alert {
                background-color: #B91C1C;
                color: white;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición de producto -->
        <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio (€)</label>
                <input type="number" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}" step="0.01" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select name="categoria" class="form-select" required>
                    <option value="">Seleccionar categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->nombre }}" {{ old('categoria', $producto->categoria) == $categoria->nombre ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagen del producto</label>
                @if ($producto->imagen)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-thumbnail">
                    </div>
                @endif
                <input type="file" name="imagen" class="form-control" accept="image/*">
            </div>

            <!-- Botones alineados -->
            <div class="d-flex justify-content-between">
                <!-- Botón de cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                </form>

                <div>
                    <!-- Botón de cancelar -->
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                    <!-- Botón de actualizar -->
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>