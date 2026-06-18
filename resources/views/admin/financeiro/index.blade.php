@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- CABEÇALHO --}}
    <div class="glass rounded-5 p-4 shadow mb-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold text-white mb-1">

                    <i class="fas fa-chart-line text-warning me-2"></i>

                    Financeiro

                </h2>

                <small class="text-secondary">

                    Resumo financeiro e indicadores do sistema

                </small>

            </div>

        </div>

    </div>

    {{-- CARDS --}}
    <div class="row g-4">

        {{-- RESERVAS --}}
        <div class="col-lg-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">

                            Total de Reservas

                        </small>

                        <h2 class="text-white fw-bold mt-2">

                            {{ $totalReservas }}

                        </h2>

                    </div>

                    <div>

                        <i class="fas fa-calendar-check fa-3x text-primary"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- EVENTOS --}}
        <div class="col-lg-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">

                            Total de Eventos

                        </small>

                        <h2 class="text-white fw-bold mt-2">

                            {{ $totalEventos }}

                        </h2>

                    </div>

                    <div>

                        <i class="fas fa-glass-cheers fa-3x text-warning"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- PRODUTOS --}}
        <div class="col-lg-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">

                            Total de Produtos (Cardapio)

                        </small>

                        <h2 class="text-white fw-bold mt-2">

                            {{ $totalCardapio }}

                        </h2>

                    </div>

                    <div>

                        <i class="fas fa-box-open fa-3x text-info"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- FATURAMENTO --}}
        <div class="col-lg-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100 border border-success">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">

                            Faturamento Total

                        </small>

                        <h3 class="text-success fw-bold mt-2">

                            R$ {{ number_format($faturamento,2,',','.') }}

                        </h3>

                    </div>

                    <div>

                        <i class="fas fa-dollar-sign fa-3x text-success"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- RESUMO FINANCEIRO --}}
    <div class="glass rounded-5 p-4 shadow mt-4">

        <h4 class="text-white mb-4">

            <i class="fas fa-chart-pie text-warning me-2"></i>

            Resumo Geral

        </h4>

        <div class="row">

            <div class="col-md-4">

                <div class="border-start border-primary border-4 ps-3">

                    <small class="text-secondary">

                        Reservas Cadastradas

                    </small>

                    <h4 class="text-white">

                        {{ $totalReservas }}

                    </h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="border-start border-warning border-4 ps-3">

                    <small class="text-secondary">

                        Eventos Realizados

                    </small>

                    <h4 class="text-white">

                        {{ $totalEventos }}

                    </h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="border-start border-success border-4 ps-3">

                    <small class="text-secondary">

                        Receita Acumulada

                    </small>

                    <h4 class="text-success">

                        R$ {{ number_format($faturamento,2,',','.') }}

                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection