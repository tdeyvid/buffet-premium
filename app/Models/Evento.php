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

    
    public function reserva()
    {
        //return $this->belongsTo(Reserva::class,'reserva_id');
        return $this->belongsTo(Reserva::class);
    }
    
}