<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cardapio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class CardapioController extends Controller
{

    public function index(Request $request)
    {

        $query = Cardapio::with('categoria');
        if ($request->filled('busca')) {
            $query->where(
                'nome',
                'like',
                "%{$request->busca}%"
            );
        }

        if ($request->filled('categoria')) {
            $query->where(
                'categoria_id',
                $request->categoria
            );
        }

        $cardapios = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();


        return view(
            'admin.cardapios.index',
            [
                'cardapios' => $cardapios,
                'totalCardapios' => Cardapio::count(),
                'totalCategorias' => Categoria::count(),
                'precoMedio' => Cardapio::avg('preco') ?? 0,
                'categorias' => Categoria::orderBy('nome')->get()

            ]
        );
    }


    public function create()
    {

        return view(
            'admin.cardapios.create',
            [
                'categorias' => Categoria::orderBy('nome')->get()
            ]
        );
    }

    public function store(Request $request)
    {

        try {

            $dados = $request->validate([

                'nome' => 'required',
                'categoria_id' => 'required|exists:categorias,id',
                'descricao' => 'nullable',
                'preco' => 'required|numeric',
                'imagem' => 'nullable|image|max:4096'

            ]);


            if ($request->hasFile('imagem')) {
                $imagem = $request->file('imagem');

                $dados['imagem'] =
                    'data:image/' . $imagem->extension() .
                    ';base64,' .
                    base64_encode(
                        file_get_contents($imagem)
                    );
            }


            Cardapio::create($dados);

            return redirect()
                ->route('admin.cardapios.index')
                ->with(
                    'success',
                    'Prato cadastrado!'
                );
        } catch (\Exception $e) {

            return back()
                ->with(
                    'error',
                    'Erro ao cadastrar prato.'
                );
        }
    }


    public function edit(Cardapio $cardapio)
    {

        return view(
            'admin.cardapios.edit',

            [
                'cardapio' => $cardapio,
                'categorias' => Categoria::orderBy('nome')->get()

            ]

        );
    }





    public function update(Request $request, Cardapio $cardapio)
    {

        try {

            $dados = $request->validate([

                'nome' => 'required|string|max:255',
                'categoria_id' => 'required|exists:categorias,id',
                'descricao' => 'nullable|string',
                'preco' => 'required|numeric|min:0',
                'imagem' => 'nullable|image|max:4096'


            ]);

            if ($request->hasFile('imagem')) {
                $dados['imagem'] =
                    $this->imagemBase64(
                        $request->file('imagem')
                    );
            }

            $cardapio->update($dados);
            return redirect()

                ->route('admin.cardapios.index')
                ->with(
                    'success',
                    'Prato atualizado com sucesso!'
                );
        } catch (Exception $e) {
            return back()

                ->withInput()
                ->with(
                    'error',
                    'Erro ao atualizar prato.'
                );
        }
    }


    public function destroy(Cardapio $cardapio)
    {
        try {
            $cardapio->delete();
            return redirect()
                ->route('admin.cardapios.index')

                ->with(
                    'success',
                    'Prato removido!'
                );
        } catch (Exception $e) {

            return back()

                ->with(
                    'error',
                    'Não foi possível remover.'
                );
        }
    }

    private function imagemBase64($imagem)
    {
        return 'data:image/' . $imagem->extension() .
            ';base64,' .
            base64_encode(
                file_get_contents($imagem)
            );
    }
}
