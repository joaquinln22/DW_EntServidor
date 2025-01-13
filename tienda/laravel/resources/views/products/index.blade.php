@extends('layout.main')
@section('contenido')
    <div class="container"><br>
        <div class="row">

        </div>
    </div>
@endsection
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
                        <!-- las rutas se llaman asi, al alias que le hayamos puesto REVISAR BIEN LOS ESPACIOS -->
                        <h3 class="float-start">Listado de productos <a href="{{ route('products.create') }}" class="float-end btn btn-success btn-sm">+ Nuevo producto</a></h3>
                    </div>
                    <div class="card-body">
                        <!-- mostramos mensaje -->
                        @if(session('info'))
                        <div class="alert alert-success">
                            {{session('info')}}
                        </div>
                        @endif
                        <!-- mensaje eliminado -->
                        @if(session('danger'))
                        <div class="alert alert-danger">
                            {{session('danger')}}
                        </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripcion</th>
                                <th>precio</th>
                            </thead>
                            <tbody>
                                @foreach($products as $producto)
                                <tr>
                                    <td>
                                        {{$producto->description}}
                                    </td>
                                    <td>
                                        {{$producto->price}} {{"€"}}
                                    </td>
                                    <td>
                                        <a href="{{route('products.edit', $producto->id)}}" class="btn btn-warning btn-sm">Editar</a>

                                        <a href="javascript: document.getElementById('delete-{{$producto->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{$producto->id}}" action="{{route('products.destroy',$producto->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>