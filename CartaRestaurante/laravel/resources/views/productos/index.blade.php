<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Transición suave entre los modos */
        body {
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .btn-success, .btn-warning, .btn-danger, .btn-home {
            border: none;
        }

        /* Modo claro */
        @media (prefers-color-scheme: light) {
            body {
                background-color: #f8f9fa;
                color: black;
            }

            .container {
                background-color: #ffffff;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            .table {
                background-color: white;
                color: black;
            }

            .table th {
                background-color: #e9ecef;
                color: black;
            }

            .btn-success {
                background-color: #198754;
                color: white;
            }

            .btn-warning {
                background-color: #ffc107;
                color: black;
            }

            .btn-danger {
                background-color: #dc3545;
                color: white;
            }

            .btn-home {
                background-color: #0d6efd;
                color: white;
            }

            .alert-success {
                background-color: #d1e7dd;
                color: #0f5132;
            }
        }

        /* Modo oscuro */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #111827;
                color: white;
            }

            .container {
                background-color: #1F2937;
            }

            .table {
                background-color: #374151;
                color: white;
            }

            .table th {
                background-color: #4B5563;
                color: white;
            }

            .btn-success {
                background-color: #10B981;
                color: white;
            }

            .btn-warning {
                background-color: #F59E0B;
                color: black;
            }

            .btn-danger {
                background-color: #EF4444;
                color: white;
            }

            .btn-home {
                background-color: #3B82F6;
                color: white;
            }

            .alert-success {
                background-color: #047857;
                color: white;
            }
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