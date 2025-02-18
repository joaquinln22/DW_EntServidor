<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
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
        }
        .table {
            background-color: #374151;
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .table th {
            background-color: #4B5563;
            color: white;
        }
        .btn-success {
            background-color: #10B981; border: none; 
        }
        .btn-warning { 
            background-color: #F59E0B; border: none;
            margin-bottom: 5px;
        }
        .btn-danger {
            background-color: #EF4444; border: none; 
        }
        .btn-home {
            background-color: #3B82F6;
            border: none;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 position-relative">
        <h1 class="text-center mb-4">Gestión de Productos</h1>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('productos.create') }}" class="btn btn-success">➕ Nuevo Producto</a>

            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-home">🏠 Panel de Control</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>€{{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->categoria }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>