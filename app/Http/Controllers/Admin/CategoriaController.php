<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{

    public function index()
    {

        $categorias = Categoria::orderBy('nome')
            ->paginate(10);

        return view(
            'admin.categorias.index',
            compact('categorias')
        );

    }




    public function create()
    {

        return view(
            'admin.categorias.create'
        );

    }

    public function store(Request $request)
    {

        $dados = $request->validate([

            'nome'=>'required|max:255|unique:categorias,nome'

        ],
        [

            'nome.required'=>'O nome da categoria é obrigatório.',
            'nome.unique'=>'Já existe uma categoria com esse nome.',
            'nome.max'=>'Máximo de 255 caracteres.'

        ]);

        try {
            Categoria::create($dados);
            return redirect()
            ->route('admin.categorias.index')
            ->with(
                'success',
                'Categoria criada com sucesso.'
            );

        }catch(\Exception $e){

            return back()
            ->with(
                'error',
                'Erro ao criar categoria.'
            );

        }


    }

    public function edit(Categoria $categoria)
    {

        return view(
            'admin.categorias.edit',
            compact('categoria')
        );

    }


    public function update(Request $request,Categoria $categoria)
    {
        $dados = $request->validate([
            'nome'=>
            'required|max:255|unique:categorias,nome,'.
            $categoria->id

        ],
        [

            'nome.required'=>'Informe o nome.',
            'nome.unique'=>'Categoria já existe.'

        ]);
        try{
            $categoria->update($dados);
            return redirect()
            ->route('admin.categorias.index')
            ->with(
                'success',
                'Categoria atualizada.'
            );



        }catch(\Exception $e){
            return back()
            ->with(
                'error',
                'Erro ao atualizar categoria.'
            );

        }

    }

    public function destroy(Categoria $categoria)
    {
        try{

            if($categoria->cardapios()->exists()){

                return redirect()
                ->route('admin.categorias.index')
                ->with(
                    'error',
                    'Não pode excluir. Existem pratos vinculados a esta categoria.'
                );

            }
            $categoria->delete();

            return redirect()
            ->route('admin.categorias.index')
            ->with(
                'success',
                'Categoria removida.'
            );

        }catch(\Exception $e){

            return redirect()
            ->route('admin.categorias.index')
            ->with(
                'error',
                'Erro ao remover categoria.'
            );

        }


    }


}