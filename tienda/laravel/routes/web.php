<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function (){
    // index,mostramos listado
    Route::get('products', function () {
        // podemos mostrarlo por descendente, los ultimos creados
        $products = Product::orderBy('created_at','desc')->get();
        return view('products.index', compact('products'));
    })->name('products.index');

    // importante darle un alias a la ruta de la vista, para poder usarlo en botones etc 
    Route::get('products/create', function () {
        return view('products.create');
    })->name('products.create'); //le damos mismo  nombre para no liar


    //Para guiardar datos, insertar en bdd, nos llevara al modelo Product
    Route::post('products', function ( Request $request) { //usamos libreria request para recibir los valores de input
        $newProduct = new Product;
        $newProduct -> description =$request->input('description');
        $newProduct->price = $request->input('price');
        $newProduct->save();
        return redirect()->route('products.index')->with('info', 'Producto insertado correctamente');
    })->name('products.store'); 

    // para eliminar 
    Route::delete('products/{id}',function($id){
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('danger', 'Producto Eliminado');;
    })->name('products.destroy');

    // para modificar
    Route::get('products/{id}/edit', function($id){
        $product= Product::findOrFail($id);
        return view('products.edit', compact('product'));
    })->name('products.edit');

    Route::put('products/{id}', function($id){
        return $id;
    })->name('products.update');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
