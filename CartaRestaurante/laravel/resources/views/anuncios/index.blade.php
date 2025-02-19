<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Anuncios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos generales */
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
                background-color: #ffffff;
                color: black;
            }

            .table th {
                background-color: #e9ecef;
                color: black;
            }

            .btn-home {
                background-color: #0d6efd;
                color: white;
            }

            .btn-danger {
                background-color: #dc3545;
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

            .btn-home {
                background-color: #3B82F6;
                color: white;
            }

            .btn-danger {
                background-color: #EF4444;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 position-relative">
        <h1 class="text-center mb-4">Gestión de Anuncios</h1>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('anuncios.create') }}" class="btn btn-success">➕ Crear Anuncio</a>

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
                    <th>Título</th>
                    <th>Mensaje</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anuncios as $anuncio)
                    <tr>
                        <td>{{ $anuncio->titulo }}</td>
                        <td>{{ $anuncio->mensaje }}</td>
                        <td>{{ $anuncio->fecha_inicio }}</td>
                        <td>{{ $anuncio->fecha_fin }}</td>
                        <td>
                            <a href="{{ route('anuncios.edit', $anuncio) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                            <form action="{{ route('anuncios.destroy', $anuncio) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este anuncio?')">🗑️ Eliminar</button>
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