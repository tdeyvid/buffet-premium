<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'user_id',
        'cliente',
        'telefone',
        'data_reserva',
        'quantidade_pessoas',
        'tipo_evento',
        'mensagem',
        'status'
    ];

    public function evento()
    {
        //return $this->hasOne(Evento::class,'reserva_id');
        return $this->hasOne(Evento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
}