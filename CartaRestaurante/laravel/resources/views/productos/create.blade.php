<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111827;
            color: white;
        }
        .container {
            background-color: #1F2937;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            max-width: 600px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control, .form-select {
            background-color: #374151;
            color: white;
            border: none;
        }
        .form-control::placeholder {
            color: #9CA3AF;
        }
        .btn-primary {
            background-color: #2563EB; 
            border: none;
        }
        .btn-secondary {
            background-color: #4B5563;
            border: none;
        }
        .btn-danger {
            background-color: #EF4444;
            border: none;
        }
        .alert {
            background-color: #B91C1C;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Nuevo Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Nota: Agregar enctype="multipart/form-data" para subir archivos -->
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ej: Pizza Margherita" value="{{ old('nombre') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" placeholder="Describe el producto..." required>{{ old('descripcion') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio (€)</label>
                <input type="number" name="precio" class="form-control" placeholder="Ej: 9.99" value="{{ old('precio') }}" step="0.01" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" placeholder="Ej: 20" value="{{ old('stock') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select name="categoria" class="form-select" required>
                    <option value="">Seleccionar categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->nombre }}" {{ old('categoria') == $categoria->nombre ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen del producto</label>
                <input type="file" name="imagen" class="form-control" accept="image/*">
            </div>

            <!-- Contenedor de botones -->
            <div class="d-flex justify-content-between">
                <!-- Botón de cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                </form>

                <div>
                    <!-- Botón de cancelar -->
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                    <!-- Botón de guardar -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>