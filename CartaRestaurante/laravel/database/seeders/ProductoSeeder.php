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
        $producto1->categoria = 'Entrantes';
        $producto1->precio = 2.99;
        $producto1->imagen = 'productos/UGyyPtCbHkHdTKVgG1T0Y6EgfnLumPPZ2JMdG3jq.jpg';
        $producto1->stock = 100;
        $producto1->save();

        $producto2 = new Producto();
        $producto2->nombre = 'Cerveza artesanal';
        $producto2->descripcion = 'Cerveza local elaborada artesanalmente.';
        $producto2->categoria = 'Bebidas';
        $producto2->precio = 1.50;
        $producto2->imagen = 'productos/Z9mc0un658wPkUJEJsXAaBj2tJ3QiFs7PgHU5C3b.jpg';
        $producto2->stock = 100;
        $producto2->save();

        $producto3 = new Producto();
        $producto3->nombre = 'Pizza Margherita';
        $producto3->descripcion = 'Pizza de masa fina con tomate, mozzarella y un toque de salsa Margherita.';
        $producto3->categoria = 'Platos principales';
        $producto3->precio = 7.50;
        $producto3->imagen = 'productos/SWBcT9op0RXn8xgSgoIKdSZm342ydEknvvJ7AbZU.jpg';
        $producto3->stock = 100;
        $producto3->save();

        $producto4 = new Producto();
        $producto4->nombre = 'Tarta de queso';
        $producto4->descripcion = 'Tarta de queso mascarpone y mermelada.';
        $producto4->categoria = 'Postres';
        $producto4->precio = 3.00;
        $producto4->imagen = 'productos/47ga9JY02DGWgtg282v3Leq82VpPplJijP7CuKBm.jpg';
        $producto4->stock = 100;
        $producto4->save();

        $producto5 = new Producto();
        $producto5->nombre = 'Refresco';
        $producto5->descripcion = 'Refresco a elegir entre: coca-cola, seven-up, etc.';
        $producto5->categoria = 'Bebidas';
        $producto5->precio = 2.00;
        $producto5->imagen = 'productos/wA6lByB76l2i1cIg6DrWfgXodoZhiXYpVxOcsGhT.jpg';
        $producto5->stock = 100;
        $producto5->save();

        $producto6 = new Producto();
        $producto6->nombre = 'Cinamon roll';
        $producto6->descripcion = 'Rollito de masa con canela y glaseado de azúcar.';
        $producto6->categoria = 'Postres';
        $producto6->precio = 2.50;
        $producto6->imagen = 'productos/RBf2364KQWRy2D8iRhquH2NAQfaVdqC8Rce0CTgG.jpg';
        $producto6->stock = 100;
        $producto6->save();

        $producto7 = new Producto();
        $producto7->nombre = 'Donut de oreo';
        $producto7->descripcion = 'Donut con cubierta de crema de oreo y espolvoreado de galleta de oreo.';
        $producto7->categoria = 'Postres';
        $producto7->precio = 3.00;
        $producto7->imagen = 'productos/tuTxQPNOiS78X0dLlgKQgkptKByd59lXanaitVgD.jpg';
        $producto7->stock = 100;
        $producto7->save();

        $producto8 = new Producto();
        $producto8->nombre = 'Zumo de naranja';
        $producto8->descripcion = 'Zumo 100% natural, recién exprimido.';
        $producto8->categoria = 'Bebidas';
        $producto8->precio = 1.50;
        $producto8->imagen = 'productos/QQxGJ4AqhU4BM9NavRHlJEhxzj4iYiYkZdVQEIJY.png';
        $producto8->stock = 100;
        $producto8->save();

        $producto9 = new Producto();
        $producto9->nombre = 'Burger de la casa';
        $producto9->descripcion = 'Hamburguesa con carne de cerdo especiada, bacón ahumado, tomate en rodajas, lechuga y cebolla morada.';
        $producto9->categoria = 'Platos principales';
        $producto9->precio = 6.50;
        $producto9->imagen = 'productos/99njYbuAnBZOZ0Ag8MX4MLhseytuLxyho9Y6pMsk.jpg';
        $producto9->stock = 100;
        $producto9->save();

        $producto10 = new Producto();
        $producto10->nombre = 'Tacos';
        $producto10->descripcion = 'Servido en tortita de maíz, lleno de carne de ternera deshilachada, acompañado con cebolla, cilantro, salsa y limón.';
        $producto10->categoria = 'Platos principales';
        $producto10->precio = 7.00;
        $producto10->imagen = 'productos/1aAcLuoE7eDDqtkW8iplt3IkrlNVqHvf6WBjxejx.jpg';
        $producto10->stock = 100;
        $producto10->save();

        $producto11 = new Producto();
        $producto11->nombre = 'Tequeños';
        $producto11->descripcion = 'Palitos de queso mozzarella recubiertos de masa de hojaldre.';
        $producto11->categoria = 'Entrantes';
        $producto11->precio = 4.00;
        $producto11->imagen = 'productos/qor9Mc9oZhUMOW9K1ywHx9PXzvv2XoniO3uL9lbE.jpg';
        $producto11->stock = 100;
        $producto11->save();

        $producto12 = new Producto();
        $producto12->nombre = 'Patatas con bacon';
        $producto12->descripcion = 'Ración de patatas para 2 con bacón y queso cheddar.';
        $producto12->categoria = 'Entrantes';
        $producto12->precio = 3.50;
        $producto12->imagen = 'productos/nTeGhBu2cZDM8qx59SF74SqFqSDFhWmmWwvcNt5r.jpg';
        $producto12->stock = 100;
        $producto12->save();

        $producto12 = new Producto();
        $producto12->nombre = 'Pizza Pepperoni';
        $producto12->descripcion = 'Pizza de masa fina con tomate, mozzarella y mucho pepperoni.';
        $producto12->categoria = 'Platos principales';
        $producto12->precio = 7.50;
        $producto12->imagen = 'productos/JBMtFyoXnPiU8RXOMHQ38yncB9wN53cGogfgk42U.jpg';
        $producto12->stock = 100;
        $producto12->save();
    }
}
