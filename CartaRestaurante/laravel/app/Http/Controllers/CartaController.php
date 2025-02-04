<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías con sus productos
        $categorias = Categoria::with('productos')->get();

        // Retornar la vista con los datos de las categorías y productos
        return view('carta', compact('categorias'));
    }
}