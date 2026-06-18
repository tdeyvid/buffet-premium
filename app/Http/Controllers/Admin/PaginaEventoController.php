<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaginaEvento;
use Illuminate\Http\Request;

class PaginaEventoController extends Controller
{

    public function index()
    {
        $pagina = PaginaEvento::first();

        if (!$pagina) {

            $pagina = PaginaEvento::create([
                'titulo' => 'Eventos Inesquecíveis'
            ]);
        }


        return view(
            'admin.eventos.pagina',
            compact('pagina')
        );
    }

    public function update(Request $request)
    {

        $pagina = PaginaEvento::first();


        $dados = $request->validate([

            'titulo' => 'nullable|string',
            'subtitulo' => 'nullable|string',

            'foto1' => 'nullable|image|max:1024',
            'foto2' => 'nullable|image|max:1024',
            'foto3' => 'nullable|image|max:1024',
            'foto4' => 'nullable|image|max:1024',

        ]);

        for ($i = 1; $i <= 4; $i++) {

            $campo = 'foto' . $i;

            if ($request->hasFile($campo)) {

                $imagem = $request->file($campo);

                // reduz qualidade usando PHP GD se existir
                $conteudo = file_get_contents(
                    $imagem->getRealPath()
                );


                $dados[$campo] =

                    'data:' .
                    $imagem->getMimeType() .
                    ';base64,' .

                    base64_encode($conteudo);
            }
        }

        $pagina->update($dados);

        return back()->with(
            'success',
            'Página atualizada com sucesso.'
        );
    }
}
