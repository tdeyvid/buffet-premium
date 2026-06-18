@extends('layouts.app')

@section('content')
    <section class="py-5 mt-5">

        <div class="container py-5">


            <div class="text-center mb-5">

                <span class="badge bg-warning text-dark px-4 py-2 rounded-pill mb-3 fw-bold fs-5">

                    Nosso Cardápio

                </span>


                <h1 class="display-4 fw-bold">

                    Experiências Gastronômicas Premium

                </h1>


                <p class="text-light-emphasis mt-3">

                    Conheça nossos pratos exclusivos preparados por chefs especializados.

                </p>


            </div>



            <div class="row g-4">


                @forelse($cardapios as $cardapio)
                    <div class="col-lg-4 col-md-6">


                        <div class="service-card h-100 overflow-hidden">


                            {{-- IMAGEM --}}
                            <div class="mb-4">


                                @if ($cardapio->imagem)
                                    <img src="{{ $cardapio->imagem }}" class="w-100 rounded-4"
                                        style="height:250px; object-fit:cover;" alt="{{ $cardapio->nome }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1544025162-d76694265947"
                                        class="w-100 rounded-4" style="height:250px; object-fit:cover;" alt="Sem imagem">
                                @endif


                            </div>




                            {{-- CONTEÚDO --}}

                            <div>


                                <span class="badge bg-warning text-dark mb-3">


                                    {{ $cardapio->categoria->nome ?? 'Buffet Premium' }}


                                </span>



                                <h3 class="fw-bold mb-3 text-white">


                                    {{ $cardapio->nome }}


                                </h3>




                                <p class="text-light-emphasis mb-4">


                                    {{ $cardapio->descricao }}


                                </p>




                                <div class="d-flex justify-content-between align-items-center">



                                    <h4 class="text-warning fw-bold mb-0">


                                        R$ {{ number_format($cardapio->preco, 2, ',', '.') }}


                                    </h4>




                                    <a href="{{ route('reservas.create') }}" class="btn btn-warning rounded-pill px-4">


                                        Reservar


                                    </a>



                                </div>



                            </div>


                        </div>


                    </div>



                @empty


                    <div class="col-12">


                        <div class="glass rounded-5 p-5 text-center">


                            <h2 class="fw-bold mb-3">


                                Nenhum prato cadastrado


                            </h2>



                            <p class="text-light-emphasis">


                                Cadastre pratos no painel administrativo.


                            </p>



                        </div>


                    </div>
                @endforelse



            </div>


        </div>


    </section>
@endsection
