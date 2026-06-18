<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        Banner::insert([

            [

                'titulo'=>'Promoção Casamentos',
                'descricao'=>'20% de desconto',
                'imagem'=>'banner1.jpg'

            ],

            [

                'titulo'=>'Eventos Corporativos',
                'descricao'=>'Pacotes empresariais',
                'imagem'=>'banner2.jpg'

            ]

        ]);
    }
}