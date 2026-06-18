<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'categoria_id',
        'imagem'
    ];

    // RELACIONAMENTO COM CATEGORIA
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
