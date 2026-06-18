@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="hero-section position-relative overflow-hidden">

    {{-- IMAGEM DE FUNDO --}}
    
    <img src="{{ asset('images/banner.jfif') }}" class="hero-bg" alt="Banner Buffet">

    <div class="hero-overlay"></div>

    <div class="container position-relative z-2">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-7 text-white">

                <h1 class="fw-bold mb-4 hero-title">
                    Transformamos Seu Evento Em Uma Experiência Inesquecível</h1>

                <p class="lead mb-5 hero-text">
                    Casamentos, aniversários, formaturas e eventos corporativos
                    com gastronomia sofisticada, decoração elegante e atendimento premium.
                </p>
                <div class="d-flex flex-wrap gap-3">

                    <a href="/reservas" class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg">
                         Fazer Reserva
                    </a>

                    <a href="/cardapio" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold">
                        Ver Cardápio
                    </a>
                </div>
            </div>

            <div class="col-lg-5 d-none d-lg-block">

                <div class="hero-card glass-card p-4 rounded-5 shadow-lg text-white">

                    <h4 class="fw-bold mb-4">Por Que Escolher Nosso Buffet?</h4>

                    <div class="d-flex mb-4">

                        <div class="me-3 fs-1 text-warning">
                            🍽️
                        </div>

                        <div>
                            <h5 class="fw-bold">
                                Gastronomia Premium
                            </h5>

                            <p class="mb-0">
                                Cardápios exclusivos preparados por chefs experientes.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">

                        <div class="me-3 fs-1 text-warning">

                            ✨

                        </div>

                        <div>

                            <h5 class="fw-bold">

                                Decoração Sofisticada

                            </h5>

                            <p class="mb-0">

                                Ambientes elegantes e personalizados
                                para cada evento.

                            </p>

                        </div>

                    </div>

                    <div class="d-flex">

                        <div class="me-3 fs-1 text-warning">

                            🎉

                        </div>

                        <div>

                            <h5 class="fw-bold">

                                Atendimento Exclusivo

                            </h5>

                            <p class="mb-0">

                                Equipe especializada para cuidar
                                de todos os detalhes.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- SOBRE --}}
<section class="py-5 bg-dark text-white">

    <div class="container py-5">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="position-relative">

                    <img
                        src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=1200"
                        class="img-fluid rounded-5 shadow-lg w-100 about-img"
                        alt="Buffet">

                    <div class="experience-badge shadow-lg">

                        <h2 class="fw-bold mb-0">

                            10+

                        </h2>

                        <small>

                            Anos de Experiência

                        </small>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <span class="text-warning fw-bold">

                    SOBRE NÓS

                </span>

                <h2 class="display-5 fw-bold my-4">

                    Sofisticação, Qualidade e Excelência

                </h2>

                <p class="text-light mb-4">

                    Somos especializados em transformar eventos em experiências únicas,
                    oferecendo gastronomia refinada, ambientes sofisticados
                    e atendimento impecável.

                </p>

            </div>

        </div>

    </div>

</section>

@endsection