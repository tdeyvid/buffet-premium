<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeria;

class SiteControllerler extends Controller
{
    public function index()
    {
        return view('reservas.index');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'data' => 'required',
            'pessoas' => 'required',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Reserva realizada com sucesso!');
    }

    public function galeria()
    {
        $galerias = Galeria::latest()->get();

        return view(
            'site.galeria',
            compact('galerias')
        );
    }
}
