<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

Route::middleware('auth')->group(function (){
    // index,mostramos listado
    Route::get('products', 'ProductController@index'
    )->name('products.index');

    // importante darle un alias a la ruta de la vista, para poder usarlo en botones etc 
    Route::get('products/create', 'ProductController@create'
    )->name('products.create'); //le damos mismo  nombre para no liar

    //Para guiardar datos, insertar en bdd, nos llevara al modelo Product
    Route::post('products', 'ProductController@store'
    )->name('products.store'); 

    // para eliminar 
    Route::delete('products/{id}', 'ProductController@destroy'
    )->name('products.destroy');

    // para modificar
    Route::get('products/{id}/edit', 'ProductController@edit'
    )->name('products.edit');

    Route::put('products/{id}', 'ProductController@update'
    )->name('products.update');
});

Auth::routes();