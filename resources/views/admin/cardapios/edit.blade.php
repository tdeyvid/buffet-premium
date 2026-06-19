@extends('layouts.admin')


@section('content')
    <div class="container-fluid">



        <div class="d-flex justify-content-between mb-4">


            <div>


                <h2 class="text-white fw-bold">

                    Editar Prato

                </h2>


                <span class="text-secondary">

                    Atualize as informações do cardápio

                </span>


            </div>



            <a href="{{ route('admin.cardapios.index') }}" class="btn btn-outline-light rounded-pill">

                Voltar

            </a>



        </div>





        <div class="card bg-dark border-0 shadow">


            <div class="card-body p-4">



                <form action="{{ route('admin.cardapios.update', $cardapio->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-4">

                            <label class="text-white">

                                Imagem

                            </label>


                            @if ($cardapio->imagem)
                                <img src="{{ asset('storage/'.$cardapio->imagem) }}" id="preview"
                                    class="img-fluid rounded mb-3" style="height:250px;object-fit:cover;">
                            @else
                                <img id="preview" class="img-fluid rounded mb-3 d-none"
                                    style="height:250px;object-fit:cover;">
                            @endif


                            <input type="file" name="imagem" class="form-control" onchange="previewImagem(event)">

                        </div>

                        <div class="col-md-8">

                            <div class="mb-3">

                                <label class="text-white">

                                    Nome

                                </label>

                                <input class="form-control" name="nome" value="{{ $cardapio->nome }}">

                            </div>


                            <div class="mb-3">


                                <label class="text-white">

                                    Categoria

                                </label>


                                <select name="categoria_id" class="form-select">

                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            @if ($categoria->id == $cardapio->categoria_id) selected @endif>

                                            {{ $categoria->nome }}


                                        </option>
                                    @endforeach


                                </select>

                            </div>

                            <div class="mb-3">


                                <label class="text-white">

                                    Descrição

                                </label>


                                <textarea name="descricao" class="form-control" rows="4">{{ $cardapio->descricao }}</textarea>


                            </div>

                            <div class="mb-3">


                                <label class="text-white">

                                    Preço

                                </label>


                                <input type="number" step="0.01" name="preco" class="form-control"
                                    value="{{ $cardapio->preco }}">


                            </div>

                            <button class="btn btn-warning rounded-pill px-5">


                                <i class="fas fa-save"></i>

                                Atualizar


                            </button>


                        </div>

                    </div>

                </form>


            </div>

        </div>

    </div>



    <script>
        function previewImagem(event) {
            let imagem = document.querySelector('#preview');
            imagem.src = URL.createObjectURL(event.target.files[0]);
            imagem.classList.remove('d-none');
        }
    </script>
@endsection
