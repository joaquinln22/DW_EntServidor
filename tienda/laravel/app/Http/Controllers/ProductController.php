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

        $text = "<b>Se ha eliminado el siguiente producto:</b>:\n"
        . "<b>Id: </b>\n"
        . "$product->id\n"
        . "<b>Descripción: </b>\n"
        . "$product->description\n"
        . "<b>Precio</b>\n"
        . "$product->price" . "€";
        
        \Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', 'Variable no configurada'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
        $product->delete();
        return redirect()->route('products.index')->with('info', 'Producto eliminado exitosamente');
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
