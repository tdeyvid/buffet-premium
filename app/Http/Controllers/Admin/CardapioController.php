<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Cardapio;
use App\Models\Categoria;
use Illuminate\Http\Request;


class CardapioController extends Controller
{

    public function index(Request $request)
    {

        $query = Cardapio::with('categoria');

        if($request->busca){

            $query->where(
                'nome',
                'like',
                '%'.$request->busca.'%'
            );

        }

        if($request->categoria){

            $query->where(
                'categoria_id',
                $request->categoria
            );

        }



        $cardapios = $query->paginate(12);



        $totalCardapios = Cardapio::count();


        $totalCategorias = Categoria::count();


        $precoMedio = Cardapio::avg('preco');


        $categorias = Categoria::all();



        return view(
            'admin.cardapios.index',
            compact(
                'cardapios',
                'totalCardapios',
                'totalCategorias',
                'precoMedio',
                'categorias'
            )
        );


    }







    public function create()
    {


        $categorias = Categoria::all();


        return view(
            'admin.cardapios.create',
            compact('categorias')
        );


    }









    public function store(Request $request)
    {


        $dados = $request->validate([


            'nome'=>'required',
            'categoria_id'=>'required',
            'descricao'=>'nullable',
            'preco'=>'required',
            'imagem'=>'nullable|image|max:4096'


        ]);




        if($request->hasFile('imagem')){


            $imagem = $request->file('imagem');


            $dados['imagem'] =
            'data:image/'.$imagem->extension().
            ';base64,'.
            base64_encode(
                file_get_contents($imagem)
            );


        }





        Cardapio::create($dados);



        return redirect()
        ->route('admin.cardapios.index')
        ->with('success','Prato cadastrado!');


    }









    public function edit(Cardapio $cardapio)
    {


        $categorias = Categoria::all();



        return view(
            'admin.cardapios.edit',
            compact(
                'cardapio',
                'categorias'
            )
        );


    }









    public function update(
        Request $request,
        Cardapio $cardapio
    )
    {



        $dados = $request->validate([


            'nome'=>'required',
            'categoria_id'=>'required',
            'descricao'=>'nullable',
            'preco'=>'required',
            'imagem'=>'nullable|image|max:4096'


        ]);







        if($request->hasFile('imagem')){


            $imagem = $request->file('imagem');


            $dados['imagem'] =
            'data:image/'.$imagem->extension().
            ';base64,'.
            base64_encode(
                file_get_contents($imagem)
            );


        }






        $cardapio->update($dados);




        return redirect()
        ->route('admin.cardapios.index')
        ->with('success','Prato atualizado!');


    }









    public function destroy(Cardapio $cardapio)
    {


        $cardapio->delete();



        return redirect()
        ->route('admin.cardapios.index')
        ->with('success','Prato removido!');


    }


}