@extends('layouts.app')

@section('content')

<section class="py-5 mt-5">

    <div class="container py-5">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-4 py-2 rounded-pill mb-3 fw-bold fs-5">
                Eventos Premium
            </span>

            <h1 class="display-4 fw-bold">
                {{ $pagina->titulo }}
            </h1>

            <p class="text-light-emphasis">
                {{ $pagina->subtitulo }}
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="feature-card text-center h-100">

                    <i class="fas fa-ring text-warning feature-icon"></i>

                    <h4>
                        {{ $pagina->casamento_titulo }}
                    </h4>

                    <p class="text-light-emphasis">
                        {{ $pagina->casamento_texto }}
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="feature-card text-center h-100">

                    <i class="fas fa-birthday-cake text-warning feature-icon"></i>

                    <h4>
                        {{ $pagina->aniversario_titulo }}
                    </h4>

                    <p class="text-light-emphasis">
                        {{ $pagina->aniversario_texto }}
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="feature-card text-center h-100">

                    <i class="fas fa-graduation-cap text-warning feature-icon"></i>

                    <h4>
                        {{ $pagina->formatura_titulo }}
                    </h4>

                    <p class="text-light-emphasis">
                        {{ $pagina->formatura_texto }}
                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="feature-card text-center h-100">

                    <i class="fas fa-building text-warning feature-icon"></i>

                    <h4>
                        {{ $pagina->corporativo_titulo }}
                    </h4>

                    <p class="text-light-emphasis">
                        {{ $pagina->corporativo_texto }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- GALERIA --}}
<section class="py-5 services-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="display-5 fw-bold">

                {{ $pagina->galeria_titulo }}

            </h2>

            <p class="text-light-emphasis">

                {{ $pagina->galeria_descricao }}

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="galeria-card">

                    <img
                        src="{{ $pagina->foto1 }}"
                        class="galeria-img">

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="galeria-card">

                    <img
                        src="{{ $pagina->foto2 }}"
                        class="galeria-img">

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="galeria-card">

                    <img
                        src="{{ $pagina->foto3 }}"
                        class="galeria-img">

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="galeria-card">

                    <img
                        src="{{ $pagina->foto4 }}"
                        class="galeria-img">

                </div>

            </div>

        </div>

    </div>

</section>

{{-- DIFERENCIAIS --}}
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="display-5 fw-bold">

                {{ $pagina->diferenciais_titulo }}

            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-3">

                <div class="stat-card text-center">

                    <i class="fas fa-award text-warning fs-1 mb-3"></i>

                    <h5>
                        {{ $pagina->diferencial_1 }}
                    </h5>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="stat-card text-center">

                    <i class="fas fa-users text-warning fs-1 mb-3"></i>

                    <h5>
                        {{ $pagina->diferencial_2 }}
                    </h5>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="stat-card text-center">

                    <i class="fas fa-utensils text-warning fs-1 mb-3"></i>

                    <h5>
                        {{ $pagina->diferencial_3 }}
                    </h5>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="stat-card text-center">

                    <i class="fas fa-star text-warning fs-1 mb-3"></i>

                    <h5>
                        {{ $pagina->diferencial_4 }}
                    </h5>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- CTA --}}
<section class="cta-section text-center">

    <div class="container">

        <h2 class="display-4 fw-bold mb-4">

            {{ $pagina->cta_titulo }}

        </h2>

        <p class="lead text-light-emphasis mb-5">

            {{ $pagina->cta_descricao }}

        </p>
        <p class=" lead text-emphasis mb-3 ">

            {{ $pagina->cta_texto }}

        </p>

        <a href="{{ route('reservas.create') }}"
           class="btn btn-warning btn-lg rounded-pill px-5">

            {{ $pagina->cta_botao }}

        </a>

    </div>

</section>

@endsection