@extends('layouts.main')
@section('contenido')
    <div class="container"><br>
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
                    <div class="card-footer">
                        Bienvenido {{auth()->user()->name}}
                        <a href="javascript: document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-end">Cerrar sesión</a>
                        <form id="logout" action="{{route('logout')}}" method="POST" style="display:none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection