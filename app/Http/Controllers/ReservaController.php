<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function create()
    {
        return view('site.reservas');
    }


    public function store(Request $request)
    {
        $request->validate([

            'nome' => 'required|max:255',
            'telefone' => 'required|max:20',
            'data_reserva' => 'required|date|after_or_equal:today',
            'quantidade_pessoas' => 'required|integer|min:1',
            'tipo_evento' => 'required|max:100',
            'mensagem' => 'nullable|max:2000',

        ], [

            'data_reserva.after_or_equal' =>
            'A data do evento não pode ser anterior à data atual.',

        ]);


        Reserva::create([

            'user_id' => auth()->id(),

            'cliente' => $request->nome,

            'telefone' => $request->telefone,

            'data_reserva' => $request->data_reserva,

            'quantidade_pessoas' =>
                $request->quantidade_pessoas,

            'tipo_evento' =>
                $request->tipo_evento,

            'mensagem' =>
                $request->mensagem,

            // CORRIGIDO
            'status' => 'pendente',

        ]);


        return redirect('/')
            ->with(
                'success',
                'Reserva enviada com sucesso!'
            );
    }



    public function minhasReservas()
    {
        $reservas = Reserva::where(
            'user_id',
            Auth::id()
        )
        ->latest()
        ->get();


        return view(
            'reservas.minhas',
            compact('reservas')
        );
    }



    public function edit(Reserva $reserva)
    {
        abort_if(
            $reserva->user_id != Auth::id(),
            403
        );


        return view(
            'reservas.edit',
            compact('reserva')
        );
    }



    public function update(
        Request $request,
        Reserva $reserva
    )
    {

        abort_if(
            $reserva->user_id != Auth::id(),
            403
        );


        $request->validate([

            'data_reserva' =>
            'required|date|after_or_equal:today',

            'quantidade_pessoas' =>
            'required|integer|min:1',

            'tipo_evento' =>
            'required',

        ]);



        $reserva->update([

            'data_reserva' =>
                $request->data_reserva,

            'quantidade_pessoas' =>
                $request->quantidade_pessoas,

            'tipo_evento' =>
                $request->tipo_evento,

            'mensagem' =>
                $request->mensagem,

        ]);



        return redirect()
            ->route('reservas.minhas')
            ->with(
                'success',
                'Reserva atualizada com sucesso.'
            );
    }




    public function destroy(Reserva $reserva)
    {
        abort_if(
            $reserva->user_id != Auth::id(),
            403
        );


        $reserva->delete();


        return back()
            ->with(
                'success',
                'Reserva removida com sucesso.'
            );
    }
}