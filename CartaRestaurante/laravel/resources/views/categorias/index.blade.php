<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Transición suave para cambios de color */
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

        .btn-home {
            margin-left: 10px;
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
                border: 1px solid #dee2e6;
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

            .alert-danger {
                background-color: #f8d7da;
                color: #842029;
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
                background-color: #14532d;
                color: white;
            }

            .alert-danger {
                background-color: #7f1d1d;
                color: white;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 position-relative">
        <h1 class="text-center mb-4">Gestión de Categorías</h1>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('categorias.create') }}" class="btn btn-success">➕ Nueva Categoría</a>

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
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar categoría?')">🗑️ Eliminar</button>
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