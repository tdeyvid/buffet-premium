@extends('layouts.site')

@section('content')
    <section class="page-header">

        <div class="container text-center">

            <h1 class="display-3 fw-bold">
                Nossa Galeria
            </h1>

            <p class="lead">
                Momentos inesquecíveis
            </p>

        </div>

    </section>

    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                @foreach ($galerias as $galeria)
                    <div class="col-lg-4 col-md-6">

                        <div class="galeria-card">

                            <img src="{{ asset('storage/' . $galeria->imagem) }}" class="img-fluid galeria-img">

                            <div class="galeria-overlay">

                                <h3>
                                    {{ $galeria->titulo }}
                                </h3>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>
@endsection
