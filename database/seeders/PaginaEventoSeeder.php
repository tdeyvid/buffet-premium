<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaginaEvento;

class PaginaEventoSeeder extends Seeder
{
    public function run(): void
    {
        PaginaEvento::truncate();

        PaginaEvento::create([

            // CABEÇALHO

            'titulo' => 'Eventos Inesquecíveis',

            'subtitulo' =>
            'Casamentos, aniversários, formaturas e eventos corporativos planejados com excelência.',


            // TIPOS DE EVENTOS

            'casamento_titulo' => 'Casamentos',

            'casamento_texto' =>
            'Celebrações elegantes com cardápio personalizado e atendimento exclusivo.',


            'aniversario_titulo' => 'Aniversários',

            'aniversario_texto' =>
            'Momentos únicos para comemorar com amigos e familiares.',


            'formatura_titulo' => 'Formaturas',

            'formatura_texto' =>
            'Eventos completos para celebrar suas conquistas.',


            'corporativo_titulo' => 'Corporativos',

            'corporativo_texto' =>
            'Eventos empresariais de alto padrão para sua empresa.',



            // GALERIA

            'galeria_titulo' =>
            'Galeria de Eventos',

            'galeria_descricao' =>
            'Alguns momentos especiais realizados por nossa equipe.',


            'foto1' => 'eventos/foto1.jpg',
            'foto2' => 'eventos/foto2.jpg',
            'foto3' => 'eventos/foto3.jpg',
            'foto4' => 'eventos/foto4.jpg',



            // DIFERENCIAIS

            'diferenciais_titulo' =>
            'Por que escolher nosso Buffet?',


            'diferencial_1' =>
            'Qualidade Premium',

            'diferencial_2' =>
            'Equipe Especializada',

            'diferencial_3' =>
            'Cardápio Exclusivo',

            'diferencial_4' =>
            'Atendimento VIP',



            // CTA FINAL

            'cta_titulo' =>
            'Vamos Planejar Seu Evento?',


            'cta_texto' =>
            'Solicite agora mesmo um orçamento personalizado.',


            'cta_botao' =>
            'Solicitar Orçamento',

        ]);
    }
}