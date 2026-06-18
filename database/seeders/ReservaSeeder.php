<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {
        Reserva::insert([
            [   
                'user_id' => 1,
                'cliente' => 'Carlos Silva',
                'telefone' => '85999999999',
                'data_reserva' => '2026-06-25',
                'quantidade_pessoas' => 40,
                'tipo_evento' => 'Aniversário',
                'mensagem' => 'Mesa próxima ao palco'
            ],
            [   
                'user_id' => 1,
                'cliente' => 'Maria Souza',
                'telefone' => '85988888888',
                'data_reserva' => '2026-07-10',
                'quantidade_pessoas' => 15,
                'tipo_evento' => 'Evento Familiar',
                'mensagem' => 'Evento familiar'
            ]
        ]);
    }
}
