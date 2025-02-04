<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos en orden descendente por fecha de creación
    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();
        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario para crear un nuevo producto
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    // Guardar un nuevo producto en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos antes de guardar
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required|exists:categorias,nombre',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|url', // Validamos que sea una URL válida
            'stock' => 'required|integer|min:0'
        ]);

        // Crear el producto con los datos validados
        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    // Mostrar formulario de edición de un producto
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar los datos de un producto
    public function update(Request $request, Producto $producto)
    {
        // Validación antes de actualizar
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required|exists:categorias,nombre',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|url',
            'stock' => 'required|integer|min:0'
        ]);

        // Actualizar el producto con los nuevos datos
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar un producto de la base de datos
    public function destroy(Producto $producto)
    {
        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'El producto no existe.');
        }

        // Eliminar el producto
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
