<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen', 'categoria', 'stock' ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'nombre');
    }
}