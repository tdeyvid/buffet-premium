<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaginaEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class PaginaEventoController extends Controller
{

    public function index()
    {
        $pagina = PaginaEvento::firstOrCreate([
            'id' => 1
        ], [
            'titulo' => 'Eventos Inesquecíveis'
        ]);


        return view(
            'admin.eventos.pagina',
            compact('pagina')
        );
    }

    public function update(Request $request)
    {
        try {

            $pagina = PaginaEvento::firstOrCreate(
                ['id' => 1],
                ['titulo' => 'Eventos Inesquecíveis']
            );

            $dados = $request->validate([
                'titulo' => 'nullable|string',
                'subtitulo' => 'nullable|string',

                'foto1' => 'nullable|image|max:4096',
                'foto2' => 'nullable|image|max:4096',
                'foto3' => 'nullable|image|max:4096',
                'foto4' => 'nullable|image|max:4096',
            ]);

            for ($i = 1; $i <= 4; $i++) {

                $campo = 'foto' . $i;

                if ($request->hasFile($campo)) {

                    if ($pagina->$campo && Storage::disk('public')->exists($pagina->$campo)) {
                        Storage::disk('public')->delete($pagina->$campo);
                    }

                    $dados[$campo] = $request->file($campo)->store('eventos', 'public');
                }
            }

            $pagina->update($dados);

            return back()->with('success', 'Página atualizada com sucesso.');
        } catch (Exception $e) {

            return back()->with('error', 'Erro ao salvar imagens.');
        }
    }
}
