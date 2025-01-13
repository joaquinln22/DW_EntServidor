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
                <div class="card">
                    <div class="card-header">
                        Editar producto
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.update', $product->id)}}" method="POST">
                            @method('put') 
                            @csrf
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" name="description" value="{{$product->description}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <a href="{{route('products.index')}}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>