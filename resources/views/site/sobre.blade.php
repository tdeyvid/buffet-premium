@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="text-center text-white py-5"
         style="background: linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.75)), url('/images/banner.jfif'); background-size: cover; background-position: center;">

    <div class="container py-5">
        <h1 class="display-4 fw-bold mb-3">
            Sobre Nós
        </h1>

        <p class="lead text-light opacity-75">
            Experiência premium em eventos inesquecíveis.
        </p>

    </div>

</section>

{{-- CONTEÚDO --}}
<section class="py-5 bg-black text-white">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- IMAGEM --}}
            <div class="col-lg-6">

                <img src="/images/sobre.jpg"
                     class="img-fluid rounded-5 shadow-lg border border-secondary">

            </div>

            {{-- TEXTO --}}
            <div class="col-lg-6">
                <p class="lead text-light opacity-75 mb-4">
                    Trabalhamos com eventos sofisticados, gastronomia refinada
                    e experiências únicas que transformam momentos especiais em memórias inesquecíveis.
                </p>

                <p class="text-light-emphasis">
                    Nosso compromisso é oferecer excelência em cada detalhe, 
                    desde o atendimento até a apresentação dos pratos e decoração.
                </p>

                {{-- ESTATÍSTICAS --}}
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="p-4 rounded-4 bg-dark border border-secondary text-center shadow-sm">
                            <h1 class="text-warning fw-bold mb-0">
                                +500
                            </h1>

                            <small class="text-light opacity-75">
                                Eventos Realizados
                            </small>

                        </div>

                    </div>

                    <div class="col-6">

                        <div class="p-4 rounded-4 bg-dark border border-secondary text-center shadow-sm">

                            <h1 class="text-warning fw-bold mb-0">
                                +10
                            </h1>

                            <small class="text-light opacity-75">
                                Anos de Experiência
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- DIFERENCIAL --}}
<section class="py-5 bg-dark text-white">

    <div class="container text-center">

        <h2 class="fw-bold mb-5 text-warning">
            Nosso Diferencial
        </h2>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="p-4 rounded-4 bg-black border border-secondary h-100 shadow-sm">

                    <i class="bi bi-cup-hot-fill text-warning fs-1 mb-3"></i>

                    <h5 class="fw-bold">
                        Gastronomia Premium
                    </h5>

                    <p class="text-light opacity-75">
                        Cardápios exclusivos com alta qualidade e apresentação impecável.
                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="p-4 rounded-4 bg-black border border-secondary h-100 shadow-sm">

                    <i class="bi bi-stars text-warning fs-1 mb-3"></i>

                    <h5 class="fw-bold">
                        Experiência Sofisticada
                    </h5>

                    <p class="text-light opacity-75">
                        Ambientes decorados com elegância para cada tipo de evento.
                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="p-4 rounded-4 bg-black border border-secondary h-100 shadow-sm">

                    <i class="bi bi-people-fill text-warning fs-1 mb-3"></i>

                    <h5 class="fw-bold">
                        Atendimento Exclusivo
                    </h5>

                    <p class="text-light opacity-75">
                        Equipe preparada para garantir a melhor experiência possível.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection