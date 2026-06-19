<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $fillable = [
        'nome',
        'categoria_id',
        'descricao',
        'preco',
        'imagem'
    ];

    // RELACIONAMENTO COM CATEGORIA
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
