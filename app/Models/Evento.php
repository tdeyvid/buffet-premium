<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [

        'reserva_id',
        'cliente',
        'telefone',
        'tipo_evento',
        'data_evento',
        'convidados',
        'valor',
        'descricao',
        'observacoes',
        'status'

    ];

     protected $casts = [

        'data_evento' => 'date',
        'valor' => 'decimal:2',
        'convidados' => 'integer'

    ];

     public function reserva()
    {
        return $this->belongsTo(
            Reserva::class
        );
    }

    
    
}