<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        //$categorias = Categoria::latest()->paginate(10);
        $categorias = Categoria::orderBy('nome')
            ->paginate(10);

        return view(
            'admin.categorias.index',
            compact('categorias')
        );
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate(

            [
                'nome' => 'required|max:255|unique:categorias,nome'
            ],

            [
                'nome.required' => 'O nome da categoria é obrigatório.',
                'nome.unique' => 'Já existe uma categoria com esse nome.',
                'nome.max' => 'O nome deve ter no máximo 255 caracteres.'
            ]

        );

        Categoria::create([

            'nome' => $request->nome

        ]);

        return redirect()
            ->route('admin.categorias.index')
            ->with(
                'success',
                'Categoria criada com sucesso.'
            );
    }


    public function edit(Categoria $categoria)
    {
        return view(
            'admin.categorias.edit',
            compact('categoria')
        );
    }


    public function update(
        Request $request,
        Categoria $categoria
    ) {
        $request->validate(

            [
                'nome' =>
                'required|max:255|unique:categorias,nome,' .
                    $categoria->id
            ],

            [
                'nome.required' =>
                'O nome da categoria é obrigatório.',

                'nome.unique' =>
                'Já existe uma categoria com esse nome.',

                'nome.max' =>
                'O nome deve ter no máximo 255 caracteres.'
            ]

        );


        $categoria->update([

            'nome' => $request->nome

        ]);


        return redirect()
            ->route('admin.categorias.index')
            ->with(
                'success',
                'Categoria atualizada com sucesso.'
            );
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->produtos()->count() > 0) {

            return redirect()
                ->route('admin.categorias.index')
                ->with(
                    'error',
                    'Não é possível excluir esta categoria porque existem produtos vinculados.'
                );
        }

        try {

            $categoria->delete();

            return redirect()
                ->route('admin.categorias.index')
                ->with(
                    'success',
                    'Categoria removida com sucesso.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->route('admin.categorias.index')
                ->with(
                    'error',
                    'Não foi possível remover a categoria.'
                );
        }
    }
}
