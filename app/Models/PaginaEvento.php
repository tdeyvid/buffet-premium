<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaginaEvento extends Model
{
    protected $table = 'pagina_eventos';

    protected $fillable = [

        'titulo',
        'subtitulo',

        'casamento_titulo',
        'casamento_texto',

        'aniversario_titulo',
        'aniversario_texto',

        'formatura_titulo',
        'formatura_texto',

        'corporativo_titulo',
        'corporativo_texto',

        'galeria_titulo',
        'galeria_descricao',

        'foto1',
        'foto2',
        'foto3',
        'foto4',

        'diferenciais_titulo',

        'diferencial_1',
        'diferencial_2',
        'diferencial_3',
        'diferencial_4',

        'cta_titulo',
        'cta_texto',
        'cta_botao',
    ];
}
