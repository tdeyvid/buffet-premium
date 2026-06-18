<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\PaginaEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {

        $eventos = Evento::latest()->get();
        $pagina = PaginaEvento::first();

        return view(
            'eventos.index',
            compact(
                'eventos',
                'pagina'
            )
        );
    }



    public function edit(Evento $evento)
    {
        return view(
            'admin.eventos.edit',
            compact('evento')
        );
    }



    public function update(Request $request, Evento $evento)
    {

        $dados = $request->validate([

            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'observacoes' => 'nullable|string',
            'status' => 'required|in:confirmado,finalizado,cancelado'

        ]);



        $evento->update($dados);

        return redirect()

            ->route('admin.eventos.index')

            ->with(
                'success',
                'Evento atualizado com sucesso.'
            );
    }
}
