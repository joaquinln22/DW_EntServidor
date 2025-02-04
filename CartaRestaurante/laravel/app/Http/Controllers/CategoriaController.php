<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Muestra la lista de todas las categorías
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Muestra el formulario para crear una nueva categoría
    public function create()
    {
        return view('categorias.create');
    }

    // Guarda una nueva categoría en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre',
            'descripcion' => 'required'
        ]);

        // Creación de la categoría
        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    // Muestra el formulario para editar una categoría
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Actualiza una categoría en la base de datos
    public function update(Request $request, Categoria $categoria)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'required'
        ]);

        // Actualización de la categoría
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    // Elimina una categoría si no tiene productos asociados
    public function destroy(Categoria $categoria)
    {
        if ($categoria->productos()->count() > 0) {
            return redirect()->route('categorias.index')->with('error', 'No se puede eliminar una categoría con productos asociados.');
        }

        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}