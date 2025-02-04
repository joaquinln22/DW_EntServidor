<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categoria1 = new Categoria();
        $categoria1->nombre = 'Entrantes';
        $categoria1->descripcion = 'Categoría de entrantes';
        $categoria1->save();

        $categoria2 = new Categoria();
        $categoria2->nombre = 'Platos principales';
        $categoria2->descripcion = 'Platos fuertes y principales';
        $categoria2->save();

        $categoria3 = new Categoria();
        $categoria3->nombre = 'Bebidas';
        $categoria3->descripcion = 'Bebidas frías y calientes';
        $categoria3->save();

        $categoria4 = new Categoria();
        $categoria4->nombre = 'Postres';
        $categoria4->descripcion = 'Dulces y postres';
        $categoria4->save();
    }
}