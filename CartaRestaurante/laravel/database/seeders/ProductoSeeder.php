<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $producto1 = new Producto();
        $producto1->nombre = 'Ensalada de tomate y cebolla';
        $producto1->descripcion = 'Ensalada con tomate, cebolla.';
        $producto1->precio = 2.99;
        $producto1->categoria = 'Entrantes';
        $producto1->imagen = 'productos/1aAcLuoE7eDDqtkW8iplt3IkrlNVqHvf6WBjxejx.jpg';
        $producto1->stock = 100;
        $producto1->save();

        $producto2 = new Producto();
        $producto2->nombre = 'Cerveza artesanal';
        $producto2->descripcion = 'Cerveza local elaborada artesanalmente.';
        $producto2->precio = 1.50;
        $producto2->categoria = 'Bebidas';
        $producto2->imagen = 'productos/.jpg';
        $producto2->stock = 100;
        $producto2->save();

        $producto3 = new Producto();
        $producto3->nombre = 'Pizza Margherita';
        $producto3->descripcion = 'Pizza de masa fina con tomate, mozzarella y un toque de salsa Margherita.';
        $producto3->precio = 7.50;
        $producto3->categoria = 'Platos principales';
        $producto3->imagen = 'productos/pizza_margarita.jpg';
        $producto3->stock = 100;
        $producto3->save();

        $producto4 = new Producto();
        $producto4->nombre = 'Tarta de queso';
        $producto4->descripcion = 'Tarta de queso mascarpone y mermelada.';
        $producto4->precio = 3.00;
        $producto4->categoria = 'Postres';
        $producto4->imagen = 'productos/47ga9JY02DGWgtg282v3Leq82VpPplJijP7CuKBm.jpg';
        $producto4->stock = 100;
        $producto4->save();
    }
}