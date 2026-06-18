<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with('reserva')
            ->latest()
            ->get();

        return view(
            'admin.eventos.index',
            compact('eventos')
        );
    }


    public function create()
    {
        return view('admin.eventos.create');
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
        $request->validate([

            'cliente'      => 'required|max:255',
            'telefone'     => 'nullable|max:255',
            'tipo_evento'  => 'required|max:255',
            'data_evento'  => 'required|date',
            'convidados'   => 'required|integer|min:1',
            'valor'        => 'required|numeric|min:0',
            'descricao'    => 'nullable|max:2000',
            'observacoes'  => 'nullable|max:2000',
            'status'       => 'required|in:confirmado,cancelado,finalizado'

        ]);

        $evento->update([

            'cliente'      => $request->cliente,
            'telefone'     => $request->telefone,
            'tipo_evento'  => $request->tipo_evento,
            'data_evento'  => $request->data_evento,
            'convidados'   => $request->convidados,
            'valor'        => $request->valor,
            'descricao'    => $request->descricao,
            'observacoes'  => $request->observacoes,
            'status'       => $request->status

        ]);

        return redirect()
            ->route('admin.eventos.index')
            ->with(
                'success',
                'Evento atualizado com sucesso.'
            );
    }


    public function show(Evento $evento)
    {
        $evento->load('reserva');

        return view(
            'admin.eventos.show',
            compact('evento')
        );
    }


    public function destroy(Evento $evento)
    {
        $evento->delete();

        return back()
            ->with(
                'success',
                'Evento removido com sucesso.'
            );
    }

    public function gerarPDF($id)
    {
        $evento = Evento::with('reserva')
            ->findOrFail($id);

        $pdf = Pdf::loadView(
            'admin.eventos.pdf',
            compact('evento')
        );

        return $pdf->download(
            'orcamento-' . $evento->id . '.pdf'
        );
    }

    public function alterarStatus(Request $request, Evento $evento)
    {
        $request->validate([
            'status' => 'required|in:confirmado,finalizado,cancelado'
        ]);

        $evento->update([
            'status' => $request->status
        ]);

        return back()->with(
            'success',
            'Status atualizado com sucesso.'
        );
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'cliente'      => 'required|max:255',
            'telefone'     => 'nullable|max:255',
            'tipo_evento'  => 'required|max:255',
            'data_evento'  => 'required|date',
            'convidados'   => 'required|integer|min:1',
            'valor'        => 'required|numeric',
            'descricao'    => 'nullable',
            'observacoes'  => 'nullable',
        ]);

        Evento::create([
            'cliente'      => $request->cliente,
            'telefone'     => $request->telefone,
            'tipo_evento'  => $request->tipo_evento,
            'data_evento'  => $request->data_evento,
            'convidados'   => $request->convidados,
            'valor'        => $request->valor,
            'descricao'    => $request->descricao,
            'observacoes'  => $request->observacoes,
            'status'       => 'confirmado',
        ]);

        return redirect()
            ->route('admin.eventos.index')
            ->with('success', 'Evento cadastrado com sucesso!');
    }
}
