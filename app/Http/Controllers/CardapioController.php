<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;

class CardapioController extends Controller
{
    public function index()
    {
        $cardapios = Cardapio::with('categoria')
            ->where('ativo', true)
            ->latest()
            ->get();


        return view(
            'cardapio.index',
            compact('cardapios')
        );
    }
}
