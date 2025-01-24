<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth')->group(function (){

});

Route::get('products', [ProductController::class, 'index'])->name('inicio');
Route::get('admin', [ProductController::class, 'index_admin'])->name('inicio_admin');

Auth::routes();

