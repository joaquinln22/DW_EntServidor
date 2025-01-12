<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header row">
                        <h3>Nuevo producto</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            <!-- para aseguranros de 2que el formulario viene de esta pagina -->
                             @csrf
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="number">Precio</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ url()->previous() }}'">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>