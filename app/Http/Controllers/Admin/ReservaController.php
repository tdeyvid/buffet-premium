<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Evento;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('evento')
            ->latest()->paginate(10);

        return view(
            'admin.reservas.index',
            compact('reservas')
        );
    }


    public function show(Reserva $reserva)
    {
        return view('admin.reservas.show', compact('reserva'));
    }


    public function destroy(Reserva $reserva)
    {
        try {

            $reserva->delete();

            return redirect()
                ->route('admin.reservas.index')
                ->with(
                    'success',
                    'Reserva removida com sucesso.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->route('admin.reservas.index')
                ->with(
                    'error',
                    'Não foi possível remover a reserva.'
                );
        }
    }

    public function aprovar(Reserva $reserva)
    {
        if ($reserva->evento) {

            return back()->with(
                'warning',
                'Esta reserva já possui um evento.'
            );
        }

        $reserva->update([
            'status' => 'confirmada'
        ]);

        Evento::create([

            'reserva_id' => $reserva->id,
            'cliente' => $reserva->cliente,
            'telefone' => $reserva->telefone,
            'tipo_evento' => $reserva->tipo_evento,
            'data_evento' => $reserva->data_reserva,
            'convidados' => $reserva->quantidade_pessoas,
            'descricao' => $reserva->mensagem,
            'valor' => 0,
            'status' => 'confirmado'

        ]);


        return back()->with(
            'success',
            'Reserva aprovada e evento criado.'
        );
    }


    public function rejeitar(Reserva $reserva)
    {
        $reserva->update([
            'status' => 'cancelada'
        ]);

        return back()->with(
            'success',
            'Reserva rejeitada.'
        );
    }

    public function alterarStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pendente,Analise,Cancelada'
        ]);

        try {

            $reserva = Reserva::findOrFail($id);

            $reserva->update([
                'status' => strtolower($request->status)
            ]);

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Status atualizado com sucesso.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Não foi possível atualizar o status.'
                );
        }
    }
}
