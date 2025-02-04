<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartaController;
use Illuminate\Support\Facades\Route;

// RUTAS PÚBLICAS

/*Route::get('/carta', function () {
    return '<h1>Vista de carta en construcción...</h1>';
});*/

Route::get('/carta', [CartaController::class, 'index'])->name('carta.index');

// RUTAS PRIVADAS
Route::middleware('auth')->group(function () {
    /*Route::get('private', function () {
        return '<h1>Vista privada en construcción...</h1>';
    });*/
    Route::get('/private', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';