@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        {{-- CABEÇALHO --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1 class="fw-bold mb-1">
                    <i class="fas fa-calendar-check text-warning me-2"></i>
                    Solicitações de Reserva
                </h1>

                <p class="text-muted mb-0">
                    Gerencie as solicitações recebidas pelos clientes
                </p>

            </div>

        </div>

        {{-- CARDS --}}
        <div class="row mb-4">

            <div class="col-md-3">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h3 class="fw-bold text-primary">

                            {{ $reservas->total() }}

                        </h3>

                        <small class="text-muted">

                            Total Reservas

                        </small>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h3 class="fw-bold text-warning">

                            {{ $reservas->where('status', 'pendente')->count() }}

                        </h3>

                        <small class="text-muted">

                            Pendentes

                        </small>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h3 class="fw-bold text-info">

                            {{ $reservas->where('status', 'analise')->count() }}

                        </h3>

                        <small class="text-muted">

                            Em Análise

                        </small>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h3 class="fw-bold text-success">

                            {{ $reservas->filter(fn($r) => $r->evento)->count() }}

                        </h3>

                        <small class="text-muted">

                            Eventos Criados

                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- TABELA --}}
        <div class="card border-0 shadow">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>#</th>
                                <th>Cliente</th>
                                <th>Contato</th>
                                <th>Data</th>
                                <th>Evento</th>
                                <th>Pessoas</th>
                                <th>Status</th>
                                <th width="420">Ações</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($reservas as $reserva)
                                @php

                                    $status = strtolower($reserva->status);

                                    $cor = match ($status) {
                                        'pendente' => 'warning',
                                        'analise' => 'info',
                                        'cancelada' => 'danger',
                                        default => 'secondary',
                                    };

                                    $icone = match ($status) {
                                        'pendente' => 'fa-clock',
                                        'analise' => 'fa-search',
                                        'cancelada' => 'fa-times-circle',
                                        default => 'fa-circle',
                                    };

                                @endphp

                                <tr @if ($reserva->evento) class="table-success" @endif>

                                    <td>

                                        <strong>#{{ $reserva->id }}</strong>

                                    </td>

                                    <td>

                                        <strong>

                                            {{ $reserva->cliente }}

                                        </strong>

                                    </td>

                                    <td>

                                        <i class="fas fa-phone text-primary"></i>

                                        {{ $reserva->telefone }}

                                    </td>

                                    <td>

                                        {{ \Carbon\Carbon::parse($reserva->data_reserva)->format('d/m/Y') }}

                                    </td>

                                    <td>

                                        {{ $reserva->tipo_evento }}

                                    </td>

                                    <td>

                                        <span class="badge bg-dark">

                                            {{ $reserva->quantidade_pessoas }}

                                        </span>

                                    </td>

                                    <td>

                                        <span class="badge bg-{{ $cor }}">

                                            <i class="fas {{ $icone }}"></i>

                                            {{ ucfirst($status) }}

                                        </span>

                                    </td>

                                    <td>

                                        <div class="d-flex flex-wrap gap-2">

                                            {{-- STATUS --}}
                                            @if (!$reserva->evento)
                                                <form action="{{ route('admin.reservas.status', $reserva->id) }}"
                                                    method="POST" class="d-flex gap-2">

                                                    @csrf
                                                    @method('PUT')

                                                    <select name="status" class="form-select form-select-sm">

                                                        <option value="pendente"
                                                            {{ $status == 'pendente' ? 'selected' : '' }}>

                                                            Pendente

                                                        </option>

                                                        <option value="analise"
                                                            {{ $status == 'analise' ? 'selected' : '' }}>

                                                            Em Análise

                                                        </option>

                                                        <option value="cancelada"
                                                            {{ $status == 'cancelada' ? 'selected' : '' }}>

                                                            Cancelada

                                                        </option>

                                                    </select>

                                                    <button class="btn btn-primary btn-sm">

                                                        <i class="fas fa-save"></i>

                                                    </button>

                                                </form>
                                            @endif

                                            {{-- APROVAR --}}
                                            @if (!$reserva->evento)
                                                <form action="{{ route('admin.reservas.aprovar', $reserva->id) }}"
                                                    method="POST">

                                                    @csrf

                                                    <button type="submit" class="btn btn-success btn-sm">

                                                        <i class="fas fa-check"></i>
                                                        Aprovar

                                                    </button>

                                                </form>
                                            @endif

                                            {{-- EVENTO --}}
                                            @if ($reserva->evento)
                                                <a href="{{ route('admin.eventos.show', $reserva->evento->id) }}"
                                                    class="btn btn-success btn-sm">

                                                    <i class="fas fa-calendar-check"></i>

                                                    Evento Criado

                                                </a>
                                            @endif

                                            {{-- DETALHES --}}
                                            <a href="{{ route('admin.reservas.show', $reserva->id) }}"
                                                class="btn btn-info btn-sm">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                            {{-- EXCLUIR --}}

                                            <form action="{{ route('admin.reservas.destroy', $reserva->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirmarExclusao(event, this.form)">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center p-5">

                                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>

                                        <br>

                                        Nenhuma reserva encontrada.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-4">

                    {{ $reservas->links() }}

                </div>

            </div>

        </div>

    </div>
@endsection
