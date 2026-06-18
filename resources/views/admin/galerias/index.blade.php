@extends('layouts.admin')


@section('content')
    <div class="container-fluid">



        <div class="glass rounded-5 p-4 shadow mb-4">


            <div class="d-flex justify-content-between align-items-center">


                <div>

                    <h2 class="text-white fw-bold">

                        <i class="fas fa-images text-warning me-2"></i>

                        Galeria

                    </h2>


                    <p class="text-secondary">

                        Gerencie as imagens do site

                    </p>


                </div>



                <a href="{{ route('admin.galerias.create') }}" class="btn btn-warning rounded-pill px-4">


                    <i class="fas fa-plus"></i>

                    Nova Imagem


                </a>



            </div>

        </div>




        @if (session('success'))
            <div class="alert alert-success rounded-4">

                {{ session('success') }}

            </div>
        @endif






        <div class="row g-4">



            @forelse($galerias as $galeria)
                <div class="col-lg-3 col-md-4">



                    <div class="glass rounded-5 overflow-hidden shadow h-100">



                        @if ($galeria->imagem)
                            <img src="{{ $galeria->imagem }}" class="w-100" style="
height:260px;
object-fit:cover;
">
                        @else
                            <div class="p-5 text-center bg-secondary">


                                <i class="fas fa-image fa-4x text-white"></i>


                                <p class="text-white">

                                    Sem imagem

                                </p>


                            </div>
                        @endif





                        <div class="p-4">



                            <h5 class="text-white fw-bold">

                                {{ $galeria->titulo }}

                            </h5>




                            <p class="text-secondary">

                                {{ $galeria->descricao }}

                            </p>




                            <div class="d-flex gap-2">



                                <a href="{{ route('admin.galerias.edit', $galeria) }}"
                                    class="btn btn-warning btn-sm rounded-pill">


                                    <i class="fas fa-edit"></i>

                                    Editar


                                </a>





                                <form action="{{ route('admin.galerias.destroy', $galeria) }}" method="POST">


                                    @csrf

                                    @method('DELETE')



                                    <button class="btn btn-danger btn-sm rounded-pill"
                                        onclick="return confirm('Excluir imagem?')">


                                        <i class="fas fa-trash"></i>


                                        Excluir


                                    </button>



                                </form>




                            </div>


                        </div>


                    </div>


                </div>



            @empty


                <div class="col-12">


                    <div class="glass rounded-5 p-5 text-center">


                        <h3 class="text-secondary">

                            Nenhuma imagem cadastrada

                        </h3>


                    </div>


                </div>
            @endforelse



        </div>




        <div class="mt-4">

            {{ $galerias->links() }}

        </div>



    </div>
@endsection
