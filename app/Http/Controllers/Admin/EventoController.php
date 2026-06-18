<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;


class EventoController extends Controller
{

    public function index()
    {

        $eventos = Evento::with('reserva')
            ->latest()
            ->paginate(10);

        return view(
            'admin.eventos.index',
            compact('eventos')
        );
    }

    public function create()
    {
        return view(
            'admin.eventos.create'
        );
    }


    public function store(Request $request)
    {
        $dados = $this->validar($request);
        try {
            DB::transaction(function () use ($dados) {
                $dados['status'] = 'confirmado';
                Evento::create($dados);
            });

            return redirect()
                ->route('admin.eventos.index')
                ->with(
                    'success',
                    'Evento cadastrado com sucesso!'
                );
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return back()
                ->with(
                    'error',
                    'Erro ao cadastrar evento.'
                );
        }
    }

    public function show(Evento $evento)
    {

        $evento->load('reserva');
        return view(
            'admin.eventos.show',
            compact('evento')
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

            'cliente' => 'required|max:255',
            'telefone' => 'nullable|max:255',
            'tipo_evento' => 'required|max:255',
            'data_evento' => 'required|date',
            'convidados' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|max:2000',
            'observacoes' => 'nullable|max:2000',
            'status' => 'required|in:confirmado,cancelado,finalizado'

        ]);
        try {
            $evento->update($dados);

            return redirect()
                ->route('admin.eventos.index')
                ->with('success', 'Evento atualizado.');
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return back()
                ->with('error', 'Erro ao atualizar evento.');
        }
    }

    public function destroy(Evento $evento)
    {

        try {

            $evento->delete();
            return back()
                ->with(
                    'success',
                    'Evento removido.'
                );
        } catch (\Exception $e) {

            return back()
                ->with(
                    'error',
                    'Não foi possível remover.'
                );
        }
    }


    public function alterarStatus(Request $request, Evento $evento)
    {

        $request->validate([

            'status' => 'required|in:confirmado,cancelado,finalizado'

        ]);

        $evento->update(['status' => $request->status]);

        return back()
            ->with(
                'success',
                'Status atualizado.'
            );
    }


    public function gerarPDF($id)
    {

        try {
            $evento = Evento::with('reserva')
                ->findOrFail($id);

            $pdf = Pdf::loadView(
                'admin.eventos.pdf',
                compact('evento')
            );


            return $pdf->download(
                'orcamento-' . $evento->id . '.pdf'
            );
        } catch (\Exception $e) {

            return back()
                ->with(
                    'error',
                    'Erro ao gerar PDF.'
                );
        }
    }

    private function validar(Request $request)
    {

        return $request->validate([

            'cliente' => 'required|max:255',
            'telefone' => 'nullable|max:255',
            'tipo_evento' => 'required|max:255',
            'data_evento' => 'required|date',
            'convidados' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|max:2000',
            'observacoes' => 'nullable|max:2000',


        ]);
    }
}
