<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anuncio</title>
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
            max-width: 600px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control, .form-select {
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

            .form-control, .form-select {
                background-color: #ffffff;
                color: black;
                border: 1px solid #ced4da;
            }

            .form-control::placeholder {
                color: #6c757d;
            }

            .btn-primary {
                background-color: #0d6efd;
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
                background-color: #dc3545;
                color: white;
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
        <h1 class="text-center mb-4">Editar Anuncio</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anuncios.update', $anuncio) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" placeholder="Ej: Promoción especial" value="{{ old('titulo', $anuncio->titulo) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mensaje</label>
                <textarea name="mensaje" class="form-control" rows="3" placeholder="Modifica el mensaje del anuncio..." required>{{ old('mensaje', $anuncio->mensaje) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="form-control" value="{{ old('fecha_inicio', $anuncio->fecha_inicio) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha Fin</label>
                <input type="date" name="fecha_fin" class="form-control" value="{{ old('fecha_fin', $anuncio->fecha_fin) }}" required>
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
                    <a href="{{ route('anuncios.index') }}" class="btn btn-secondary">Cancelar</a>
                    <!-- Botón de actualizar -->
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>