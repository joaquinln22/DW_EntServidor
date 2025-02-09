<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AnuncioController;
use Illuminate\Support\Facades\Route;

// RUTAS PÚBLICAS
Route::get('/carta', [ProductoController::class, 'indexPublico'])->name('carta');

// RUTAS PRIVADAS
Route::middleware('auth')->group(function () {
    Route::get('/private', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/categorias', CategoriaController::class);
    Route::resource('/productos', ProductoController::class);
    Route::resource('/anuncios', AnuncioController::class);
});

require __DIR__.'/auth.php';