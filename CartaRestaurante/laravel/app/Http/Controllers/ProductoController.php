<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    // Vista pública de la carta con productos y anuncios activos
    public function indexPublico(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('productos.index');
        }

        // Obtener categorías con sus productos
        $categorias = Categoria::with('productos')->get();
        $query = Producto::query();

        // Obtener anuncios activos (entre fecha_inicio y fecha_fin)
        $anuncios = Anuncio::whereDate('fecha_inicio', '<=', now())
                            ->whereDate('fecha_fin', '>=', now())
                            ->orderBy('fecha_inicio', 'asc')
                            ->get();

        // Filtrar productos según la búsqueda
        $filterType = $request->input('filter_type');

        if ($filterType == 'nombre' && $request->filled('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        } elseif ($filterType) {
            // Filtrar por categoría usando el nombre
            $query->where('categoria', $filterType);
        }

        $productos = $query->get();
        
        return view('carta', compact('productos', 'categorias', 'anuncios'));
    }

    // Formulario de creación
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    // Guardar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required|exists:categorias,nombre',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
        ]);
    
        $producto = new Producto($request->except('imagen'));
    
        if ($request->hasFile('imagen')) {
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }
    
        $producto->save();
    
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    // Formulario de edición
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar producto
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required|exists:categorias,nombre',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
        ]);
    
        $producto->fill($request->except('imagen'));
    
        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }
    
        $producto->save();
    
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}