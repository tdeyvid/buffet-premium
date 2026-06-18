@extends('layouts.admin')

@section('content')

<div class="container-fluid">


    {{-- CABEÇALHO --}}
    <div class="glass rounded-5 p-4 shadow mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold text-white mb-1">

                    <i class="fas fa-chart-line text-warning me-2"></i>

                    Dashboard Financeiro

                </h2>

                <small class="text-secondary">

                    Visão geral do desempenho do Sítio Vitória

                </small>

            </div>

            <div>

                <span class="badge bg-success fs-6 px-3 py-2">

                    {{ now()->format('d/m/Y') }}

                </span>

            </div>

        </div>

    </div>

    {{-- CARDS PRINCIPAIS --}}
    <div class="row g-4 mb-4">

        <div class="col-xl-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            Reservas
                        </small>

                        <h2 class="fw-bold text-white mt-2">

                            {{ $totalReservas }}

                        </h2>

                    </div>

                    <i class="fas fa-calendar-check fa-3x text-primary"></i>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            Eventos
                        </small>

                        <h2 class="fw-bold text-white mt-2">

                            {{ $totalEventos }}

                        </h2>

                    </div>

                    <i class="fas fa-glass-cheers fa-3x text-warning"></i>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            Cardápio
                        </small>

                        <h2 class="fw-bold text-white mt-2">

                            {{ $totalCardapio }}

                        </h2>

                    </div>

                    <i class="fas fa-box-open fa-3x text-info"></i>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100 border border-success">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-secondary">
                            Faturamento Total
                        </small>

                        <h3 class="fw-bold text-success mt-2">

                            R$ {{ number_format($faturamento, 2, ',', '.') }}
                        
                        </h3>

                    </div>

                    <i class="fas fa-dollar-sign fa-3x text-success"></i>

                </div>

            </div>

        </div>

    </div>

    {{-- FATURAMENTO --}}
    <div class="row g-4 mb-4">

        <div class="col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <small class="text-secondary">

                    Faturamento do Mês

                </small>

                <h2 class="fw-bold text-warning mt-3">

                    R$ {{ number_format($faturamentoMes ?? 0, 2, ',', '.') }}
                    

                </h2>

            </div>

        </div>

        <div class="col-md-6">

            <div class="glass rounded-5 p-4 shadow h-100">

                <small class="text-secondary">

                    Ticket Médio por Evento

                </small>

                <h2 class="fw-bold text-info mt-3">

                    R$ {{ number_format($ticketMedio ?? 0, 2, ',', '.') }}

                </h2>

            </div>

        </div>

    </div>

    {{-- STATUS DOS EVENTOS --}}
    <div class="glass rounded-5 p-4 shadow mb-4">

        <h4 class="text-white mb-4">

            <i class="fas fa-tasks text-warning me-2"></i>

            Eventos por Status

        </h4>

        <div class="row">

            <div class="col-md-4">

                <div class="alert alert-success">

                    <strong>Confirmados:</strong>

                    {{ $confirmados }}

                </div>

            </div>

            <div class="col-md-4">

                <div class="alert alert-primary">

                    <strong>Finalizados:</strong>

                    {{ $finalizados }}

                </div>

            </div>

            <div class="col-md-4">

                <div class="alert alert-danger">

                    <strong>Cancelados:</strong>

                    {{ $cancelados }}

                </div>

            </div>

        </div>

    </div>

    {{-- ÚLTIMOS EVENTOS --}}
    <div class="glass rounded-5 p-4 shadow">

        <h4 class="text-white mb-4">

            <i class="fas fa-history text-warning me-2"></i>

            Últimos Eventos

        </h4>

        <div class="table-responsive">

            <table class="table table-dark table-hover align-middle">

                <thead>

                    <tr>

                        <th>Cliente</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Valor</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($ultimosEventos as $evento)

                        <tr>

                            <td>

                                {{ $evento->cliente }}

                            </td>

                            <td>

                                {{ $evento->tipo_evento }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}

                            </td>

                            <td>

                                @if($evento->status == 'confirmado')

                                    <span class="badge bg-success">

                                        Confirmado

                                    </span>

                                @elseif($evento->status == 'finalizado')

                                    <span class="badge bg-primary">

                                        Finalizado

                                    </span>

                                @elseif($evento->status == 'cancelado')

                                    <span class="badge bg-danger">

                                        Cancelado

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">

                                        Pendente

                                    </span>

                                @endif

                            </td>

                            <td class="text-success fw-bold">

                                R$ {{ number_format($evento->valor, 2, ',', '.') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-5">

                                Nenhum evento encontrado.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection