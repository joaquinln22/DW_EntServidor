<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importar Auth

class ProductoController extends Controller
{
    // Mostrar todos los productos en orden descendente por fecha de creación
    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();
        return view('productos.index', compact('productos'));
    }

    public function indexPublico(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('productos.index');
        }

        // Obtener todas las categorías con sus productos
        $categorias = Categoria::with('productos')->get();

        // Iniciar la consulta de productos
        $query = Producto::query();

        // Verificar el tipo de filtro seleccionado
        $filterType = $request->input('filter_type');

        if ($filterType == 'nombre' && $request->filled('search')) {
            // Buscar por nombre del producto
            $query->where('nombre', 'like', '%' . $request->search . '%');
        } elseif (in_array($filterType, ['Entrantes', 'Platos principales', 'Bebidas', 'Postres'])) {
            // Filtrar por categoría (basado en el nombre, no en el ID)
            $query->where('categoria', $filterType);
        }

        // Obtener los productos filtrados
        $productos = $query->get();

        return view('carta', compact('productos', 'categorias'));
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
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|url',
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
            'categoria_id' => 'required|exists:categorias,id',
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