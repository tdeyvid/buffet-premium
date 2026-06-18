@extends('layouts.admin')


@section('content')
    <div class="container-fluid">



        <div class="glass rounded-5 p-4 shadow mb-4">


            <h2 class="text-white fw-bold">

                <i class="fas fa-edit text-warning me-2"></i>

                Editar Galeria

            </h2>


        </div>





        <div class="glass rounded-5 p-4">


            <form method="POST" action="{{ route('admin.galerias.update', $galeria) }}" enctype="multipart/form-data">


                @csrf

                @method('PUT')





                <div class="row g-4">





                    <div class="col-md-6">


                        <label class="text-white">

                            Título

                        </label>


                        <input type="text" name="titulo" class="form-control" value="{{ $galeria->titulo }}">


                    </div>





                    <div class="col-md-12">


                        <label class="text-white">

                            Descrição

                        </label>


                        <textarea name="descricao" class="form-control" rows="5">{{ $galeria->descricao }}</textarea>


                    </div>







                    <div class="col-md-6">


                        <label class="text-white">

                            Trocar imagem

                        </label>


                        <input type="file" name="imagem" class="form-control">


                    </div>







                    <div class="col-md-6">


                        @if ($galeria->imagem)
                            <img src="{{ str_starts_with($galeria->imagem, 'data:image') ? $galeria->imagem : asset('storage/' . $galeria->imagem) }}"
                                class="rounded-4" style="width:100%;height:220px;object-fit:cover;">
                        @endif


                    </div>




                </div>







                <div class="mt-4 d-flex justify-content-between">


                    <a href="{{ route('admin.galerias.index') }}" class="btn btn-secondary rounded-pill px-4">


                        Voltar


                    </a>


                    <button class="btn btn-warning rounded-pill px-5 fw-bold">


                        <i class="fas fa-save me-2"></i>


                        Salvar


                    </button>


                </div>


            </form>

        </div>

    </div>
@endsection
