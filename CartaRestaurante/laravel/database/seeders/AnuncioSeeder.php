<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anuncio;
use Carbon\Carbon;

class AnuncioSeeder extends Seeder
{
    public function run()
    {
        $anuncio1 = new Anuncio();
        $anuncio1->titulo = 'Descuento del 20%';
        $anuncio1->mensaje = '¡Aprovecha nuestro descuento en platos seleccionados!';
        $anuncio1->fecha_inicio = Carbon::now();
        $anuncio1->fecha_fin = Carbon::now()->addDays(7);
        $anuncio1->save();

        $anuncio2 = new Anuncio();
        $anuncio2->titulo = 'Nueva Cerveza artesanal';
        $anuncio2->mensaje = 'Descubre la nueva cerveza de nuestra carta, especial para los amantes de la cerveza.';
        $anuncio2->fecha_inicio = Carbon::now();
        $anuncio2->fecha_fin = Carbon::now()->addDays(10);
        $anuncio2->save();

        $anuncio3 = new Anuncio();
        $anuncio3->titulo = 'Oferta en Pizzas';
        $anuncio3->mensaje = '¡Consigue 2x1 en todas las pizzas los viernes!';
        $anuncio3->fecha_inicio = Carbon::now();
        $anuncio3->fecha_fin = Carbon::now()->addDays(5);
        $anuncio3->save();
    }
}