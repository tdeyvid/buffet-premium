@extends('layouts.site')

@section('content')
    <section class="page-header text-center">

        <div class="container">

            <h1 class="display-3 fw-bold">
                Eventos
            </h1>

            <p class="lead">
                Eventos exclusivos para todos os momentos.
            </p>

        </div>

    </section>

    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                @foreach ($eventos as $evento)
                    <div class="col-lg-4">

                        <div class="produto-card h-100">

                            <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622" class="produto-img">

                            <div class="p-4">

                                <h3 class="fw-bold">
                                    {{ $evento->titulo }}
                                </h3>

                                <p>
                                    {{ $evento->descricao }}
                                </p>

                                <a href="#" class="btn btn-warning rounded-pill">
                                    Ver Evento
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>
@endsection
