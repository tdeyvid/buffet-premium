<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeria;

class GaleriaSeeder extends Seeder
{
    public function run(): void
    {
        Galeria::insert([

            [
                'titulo'=>'Casamento',
                'imagem'=>'galeria/exemplo1.jpg'
            ],

            [
                'titulo'=>'Aniversário',
                'imagem'=>'galeria/exemplo2.jpg'
            ]

        ]);
    }
}