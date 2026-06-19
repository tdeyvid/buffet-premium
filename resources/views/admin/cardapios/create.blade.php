@extends('layouts.admin')


@section('content')
    <div class="container-fluid">


        <div class="d-flex justify-content-between align-items-center mb-4">


            <div class="d-flex align-items-center gap-3">


                <div class="bg-warning text-dark rounded-circle p-3 shadow">

                    <i class="fas fa-plus fa-2x"></i>

                </div>


                <div>

                    <h2 class="fw-bold text-white mb-0">

                        Novo Prato

                    </h2>


                    <small class="text-secondary">

                        Cadastre um novo item no cardápio

                    </small>

                </div>


            </div>



            <a href="{{ route('admin.cardapios.index') }}" class="btn btn-outline-light rounded-pill">


                <i class="fas fa-arrow-left"></i>

                Voltar


            </a>



        </div>






        <div class="card bg-dark border-0 shadow-lg">


            <div class="card-body p-4">



                <form action="{{ route('admin.cardapios.store') }}" method="POST" enctype="multipart/form-data">


                    @csrf




                    <div class="row g-4">



                        {{-- IMAGEM --}}

                        <div class="col-md-4">



                            <label class="text-white mb-2">

                                Imagem do prato

                            </label>



                            <input type="file" name="imagem" class="form-control" onchange="previewImagem(event)">





                            <img id="preview" class="img-fluid rounded mt-3 d-none"
                                style="height:250px;object-fit:cover;">



                        </div>





                        {{-- DADOS --}}


                        <div class="col-md-8">





                            <div class="mb-3">


                                <label class="text-white">

                                    Nome do prato

                                </label>


                                <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">


                                @error('nome')
                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror


                            </div>





                            <div class="mb-3">


                                <label class="text-white">

                                    Categoria

                                </label>



                                <select name="categoria_id" class="form-select">


                                    <option value="">
                                        Selecione
                                    </option>


                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">

                                            {{ $categoria->nome }}

                                        </option>
                                    @endforeach


                                </select>


                            </div>


                            <div class="mb-3">


                                <label class="text-white">

                                    Descrição

                                </label>


                                <textarea name="descricao" rows="4" class="form-control">{{ old('descricao') }}</textarea>


                            </div>

                            <div class="mb-3">


                                <label class="text-white">

                                    Preço

                                </label>


                                <input type="number" step="0.01" name="preco" class="form-control"
                                    value="{{ old('preco') }}">


                            </div>


                        </div>



                    </div>

                    <hr class="border-secondary">

                    <button class="btn btn-warning rounded-pill px-5">


                        <i class="fas fa-save"></i>

                        Salvar Prato


                    </button>


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
