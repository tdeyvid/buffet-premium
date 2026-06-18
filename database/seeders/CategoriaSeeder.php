<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [

            ['nome'=>'Salgados'],
            ['nome'=>'Doces'],
            ['nome'=>'Bebidas'],
            ['nome'=>'Pratos'],
            ['nome'=>'Sobremesas']

        ];

        Categoria::insert($categorias);
    }
}