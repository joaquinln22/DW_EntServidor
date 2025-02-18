<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
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
        <h1 class="text-center mb-4">Editar Categoría</h1>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $categoria->nombre) }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $categoria->descripcion) }}</textarea>
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
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                    <!-- Botón de actualizar -->
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>