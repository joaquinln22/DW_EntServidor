<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Anuncios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Anuncios</h1>
        <a href="{{ route('anuncios.create') }}" class="btn btn-primary mb-3">Crear Anuncio</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
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
                            <a href="{{ route('anuncios.edit', $anuncio) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('anuncios.destroy', $anuncio) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este anuncio?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>