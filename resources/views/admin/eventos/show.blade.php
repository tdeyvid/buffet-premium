@extends('layouts.admin')

@section('content')

<div class="container-fluid">


{{-- CABEÇALHO --}}
<div class="glass rounded-5 p-4 shadow mb-4">

    <div class="d-flex justify-content-between align-items-center flex-wrap">

        <div>

            <h2 class="fw-bold text-white mb-1">

                <i class="fas fa-calendar-check text-warning me-2"></i>

                Detalhes do Evento #{{ $evento->id }}

            </h2>

            <small class="text-secondary">

                Visualização completa do evento

            </small>

        </div>

        <div>

            <a href="{{ route('admin.eventos.edit', $evento->id) }}"
               class="btn btn-warning rounded-pill px-4 me-2">

                <i class="fas fa-edit me-2"></i>

                Editar

            </a>

            <a href="{{ route('admin.eventos.index') }}"
               class="btn btn-outline-light rounded-pill px-4">

                <i class="fas fa-arrow-left me-2"></i>

                Voltar

            </a>

        </div>

    </div>

</div>

{{-- STATUS E VALOR --}}
<div class="row g-4 mb-4">

    <div class="col-md-6">

        <div class="glass rounded-5 p-4 shadow h-100">

            <div class="text-secondary mb-2">

                Status do Evento

            </div>

            <div>

                @switch($evento->status)

                    @case('confirmado')

                        <span class="badge bg-success px-4 py-3 fs-6">
                            Confirmado
                        </span>

                        @break

                    @case('finalizado')

                        <span class="badge bg-primary px-4 py-3 fs-6">
                            Finalizado
                        </span>

                        @break

                    @case('cancelado')

                        <span class="badge bg-danger px-4 py-3 fs-6">
                            Cancelado
                        </span>

                        @break

                    @default

                        <span class="badge bg-warning text-dark px-4 py-3 fs-6">
                            Pendente
                        </span>

                @endswitch

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="glass rounded-5 p-4 shadow h-100">

            <div class="text-secondary mb-2">

                Valor do Evento

            </div>

            <h2 class="fw-bold text-success mb-0">

                R$ {{ number_format($evento->valor, 2, ',', '.') }}

            </h2>

        </div>

    </div>

</div>

{{-- DADOS PRINCIPAIS --}}
<div class="glass rounded-5 p-4 shadow mb-4">

    <h4 class="text-warning fw-bold mb-4">

        <i class="fas fa-user me-2"></i>

        Dados do Cliente

    </h4>

    <div class="row g-4">

        <div class="col-md-6">

            <div class="bg-dark rounded-4 p-3">

                <small class="text-secondary">

                    Cliente

                </small>

                <div class="text-white fw-bold fs-5">

                    {{ $evento->cliente }}

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="bg-dark rounded-4 p-3">

                <small class="text-secondary">

                    Telefone

                </small>

                <div class="text-white fw-bold fs-5">

                    {{ $evento->telefone ?: '-' }}

                </div>

            </div>

        </div>

    </div>

</div>

{{-- DADOS DO EVENTO --}}
<div class="glass rounded-5 p-4 shadow mb-4">

    <h4 class="text-warning fw-bold mb-4">

        <i class="fas fa-calendar-alt me-2"></i>

        Informações do Evento

    </h4>

    <div class="row g-4">

        <div class="col-md-3">

            <div class="bg-dark rounded-4 p-3">

                <small class="text-secondary">

                    Tipo do Evento

                </small>

                <div class="text-white fw-bold">

                    {{ $evento->tipo_evento }}

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="bg-dark rounded-4 p-3">

                <small class="text-secondary">

                    Data

                </small>

                <div class="text-white fw-bold">

                    {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="bg-dark rounded-4 p-3">

                <small class="text-secondary">

                    Convidados

                </small>

                <div class="text-white fw-bold">

                    {{ $evento->convidados }}

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="bg-dark rounded-4 p-3">

                <small class="text-secondary">

                    Reserva Vinculada

                </small>

                <div class="text-white fw-bold">

                    {{ $evento->reserva_id ? '#'.$evento->reserva_id : 'Não vinculada' }}

                </div>

            </div>

        </div>

    </div>

</div>

{{-- DESCRIÇÃO --}}
<div class="glass rounded-5 p-4 shadow mb-4">

    <h4 class="text-warning fw-bold mb-3">

        <i class="fas fa-align-left me-2"></i>

        Descrição

    </h4>

    <div class="bg-dark rounded-4 p-4 text-white">

        {!! nl2br(e($evento->descricao ?: 'Nenhuma descrição cadastrada.')) !!}

    </div>

</div>

{{-- OBSERVAÇÕES --}}
<div class="glass rounded-5 p-4 shadow">

    <h4 class="text-warning fw-bold mb-3">

        <i class="fas fa-sticky-note me-2"></i>

        Observações

    </h4>

    <div class="bg-dark rounded-4 p-4 text-white">

        {!! nl2br(e($evento->observacoes ?: 'Nenhuma observação cadastrada.')) !!}

    </div>

</div>


</div>

@endsection
