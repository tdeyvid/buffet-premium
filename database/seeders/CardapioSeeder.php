<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cardapio;

class CardapioSeeder extends Seeder
{
    public function run(): void
    {

        Cardapio::create([
            'nome'=>'Mini Hambúrguer',
            'descricao'=>'Mini hambúrguer artesanal',
            'preco'=>15.90,
            'categoria_id'=>1
        ]);


        Cardapio::create([
            'nome'=>'Coxinha Gourmet',
            'descricao'=>'Coxinha cremosa',
            'preco'=>8.50,
            'categoria_id'=>1
        ]);


        Cardapio::create([
            'nome'=>'Mousse Chocolate',
            'descricao'=>'Mousse artesanal',
            'preco'=>12.00,
            'categoria_id'=>5
        ]);

    }
}