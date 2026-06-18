<?php

namespace Database\Seeders;

use App\Models\Cardapio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([

            AdminUserSeeder::class,
            CategoriaSeeder::class,
            CardapioSeeder::class,
            ReservaSeeder::class,
            BannerSeeder::class,
            GaleriaSeeder::class,
            PaginaEventoSeeder::class,

        ]);
    }
}
