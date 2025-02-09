<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Services\TelegramService;

class AnuncioController extends Controller
{
    // Mostrar la lista de anuncios
    public function index()
    {
        $anuncios = Anuncio::all();
        return view('anuncios.index', compact('anuncios'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('anuncios.create');
    }

    // Guardar un nuevo anuncio
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'mensaje' => 'required|string',
            'fecha_inicio' => 'required|date|before_or_equal:fecha_fin',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);
    
        $anuncio = Anuncio::create($request->all());
    
        // Enviar notificación a Telegram
        $telegram = new TelegramService();
        $mensaje = "📢 <b>NUEVO ANUNCIO</b>\n\n📌 <b>{$anuncio->titulo}</b>\n📝 {$anuncio->mensaje}\n📅 Disponible hasta: {$anuncio->fecha_fin}";
    
        if ($telegram->sendMessage($mensaje)) {
            return redirect()->route('anuncios.index')->with('success', 'Anuncio creado y enviado a Telegram correctamente.');
        } else {
            return redirect()->route('anuncios.index')->with('error', 'Anuncio creado, pero no se pudo enviar a Telegram.');
        }
    }

    // Mostrar formulario de edición
    public function edit(Anuncio $anuncio)
    {
        return view('anuncios.edit', compact('anuncio'));
    }

    // Actualizar un anuncio
    public function update(Request $request, Anuncio $anuncio)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'mensaje' => 'required|string',
            'fecha_inicio' => 'required|date|before_or_equal:fecha_fin',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $anuncio->update($request->all());

        return redirect()->route('anuncios.index')->with('success', 'Anuncio actualizado correctamente.');
    }

    // Eliminar un anuncio
    public function destroy(Anuncio $anuncio)
    {
        $anuncio->delete();
        return redirect()->route('anuncios.index')->with('success', 'Anuncio eliminado correctamente.');
    }
}