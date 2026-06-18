<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{

    public function index()
    {
        $galerias = Galeria::latest()
            ->paginate(12);

        return view(
            'admin.galerias.index',
            compact('galerias')
        );
    }



    public function create()
    {
        return view(
            'admin.galerias.create'
        );
    }



    public function store(Request $request)
    {

        $request->validate([

            'titulo' => 'required',
            'descricao' => 'nullable',
            'imagem' => 'nullable|image|max:4096'

        ]);



        $imagem = null;


        if ($request->hasFile('imagem')) {


            $arquivo = $request->file('imagem');


            $imagem =
                'data:image/' . $arquivo->extension() . ';base64,' .
                base64_encode(
                    file_get_contents($arquivo)
                );
        }



        Galeria::create([

            'titulo' => $request->titulo,

            'descricao' => $request->descricao,

            'imagem' => $imagem

        ]);



        return redirect()

            ->route('admin.galerias.index')

            ->with(
                'success',
                'Imagem cadastrada com sucesso.'
            );
    }





    public function edit(Galeria $galeria)
    {

        return view(

            'admin.galerias.edit',

            compact('galeria')

        );
    }





    public function update(Request $request, Galeria $galeria)
    {


        $dados = $request->validate([

            'titulo' => 'required',
            'descricao' => 'nullable',
            'imagem' => 'nullable|image|max:4096'

        ]);



        if ($request->hasFile('imagem')) {


            $arquivo = $request->file('imagem');


            $dados['imagem'] =

                'data:image/' . $arquivo->extension() . ';base64,' .

                base64_encode(
                    file_get_contents($arquivo)
                );
        }



        $galeria->update($dados);



        return redirect()

            ->route('admin.galerias.index')

            ->with(
                'success',
                'Imagem atualizada com sucesso.'
            );
    }






    public function destroy(Galeria $galeria)
    {


        $galeria->delete();



        return back()->with(

            'success',

            'Imagem removida com sucesso.'

        );
    }
}
