@extends('layouts.app')

@section('content')
    <section class="py-5 mt-5">

        <div class="container py-5">

            <div class="text-center mb-5">

                <span class="badge bg-warning text-dark px-4 py-2 rounded-pill mb-3 fw-bold fs-5">

                    Nossa Galeria

                </span>

                <h1 class="display-4 fw-bold text-white"> Eventos Memoráveis </h1>

                <p class="text-light-emphasis">

                    Confira alguns momentos especiais realizados pelo Buffet Premium.

                </p>

            </div>

            <div class="row g-3">
                @forelse($galerias as $galeria)
                   <div class="col-xl-3 col-lg-3 col-md-6 col-12">

                        <div class="galeria-card shadow-lg rounded-5 overflow-hidden">

                            <div class="position-relative overflow-hidden">

                                @if ($galeria->imagem)
                                    <img src="{{ $galeria->imagem }}" class="galeria-img w-100"
                                        style="height:220px; object-fit:cover;">
                                @else
                                    <div class="bg-secondary d-flex align-items-center justify-content-center"
                                        style="height:220px;">

                                        <div class="text-center">

                                            <i class="fas fa-image fa-4x text-white mb-3"></i>

                                            <h5 class="text-white">Sem imagem </h5>

                                        </div>

                                    </div>
                                @endif

                                <div class="galeria-overlay">

                                    <div>

                                        <h4 class="fw-bold text-white">

                                            {{ $galeria->titulo }}

                                        </h4>

                                        @if ($galeria->descricao)
                                            <p class="text-light mb-0">

                                                {{ $galeria->descricao }}

                                            </p>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="glass rounded-5 p-5 text-center">

                            <i class="fas fa-images fa-5x text-secondary mb-4"></i>

                            <h2 class="fw-bold text-white"> Nenhuma imagem cadastrada </h2>

                            <p class="text-secondary"> Em breve teremos novidades.</p>

                        </div>



                    </div>
                @endforelse





            </div>






        </div>


    </section>
@endsection
