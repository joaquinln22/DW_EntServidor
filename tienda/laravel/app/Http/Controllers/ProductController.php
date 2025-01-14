<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('created_at','desc')->get();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store( Request $request) { //usamos libreria request para recibir los valores de input
        $newProduct = new Product;
        $newProduct -> description =$request->input('description');
        $newProduct->  price = $request->input('price');
        $newProduct->save();
        return redirect()->route('products.index')->with('info', 'Producto insertado correctamente');
    }

    public function destroy($id){
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('info', 'Producto eliminado exitosamente');;
    }

    public function edit($id){
        $product= Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $product= Product::findOrFail($id);
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->save();
        return redirect()->route('products.index')->with('info', 'Producto modificado correctamente');
    }
}
