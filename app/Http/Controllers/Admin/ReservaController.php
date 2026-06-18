<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{

    public function index()
    {
        $reservas = Reserva::with('evento')
            ->latest()
            ->paginate(10);

        return view(
            'admin.reservas.index',
            compact('reservas')
        );
    }


    public function show(Reserva $reserva)
    {
        $reserva->load('evento');

        return view(
            'admin.reservas.show',
            compact('reserva')
        );
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

            return back()
                ->with(
                    'error',
                    'Erro ao remover reserva.'
                );
        }
    }





    public function aprovar(Reserva $reserva)
    {

        try {

            DB::transaction(function () use ($reserva) {


                if ($reserva->evento) {

                    throw new \Exception(
                        'Já existe evento criado.'
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
            });



            return back()
                ->with(
                    'success',
                    'Reserva aprovada e evento criado.'
                );
        } catch (\Exception $e) {


            return back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }





    public function rejeitar(Reserva $reserva)
    {

        try {


            $reserva->update([

                'status' => 'cancelada'

            ]);


            return back()
                ->with(
                    'success',
                    'Reserva cancelada.'
                );
        } catch (\Exception $e) {

            return back()
                ->with(
                    'error',
                    'Erro ao cancelar reserva.'
                );
        }
    }

    public function alterarStatus(Request $request, $id)
    {
        $request->validate([

            'status' => 'required|in:pendente,analise,confirmada,cancelada'

        ]);


        try {

            $reserva = Reserva::findOrFail($id);


            $reserva->update([

                'status' => $request->status

            ]);


            return back()->with(
                'success',
                'Status atualizado com sucesso.'
            );
        } catch (\Exception $e) {


            return back()->with(
                'error',
                'Não foi possível atualizar o status.'
            );
        }
    }
}
