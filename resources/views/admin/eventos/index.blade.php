@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row mb-4">

        <div class="col-md-6">

            <h1 class="fw-bold mb-1">
                <i class="fas fa-calendar-check text-warning me-2"></i>
                Agenda de Eventos
            </h1>

            <p class="text-muted mb-0">
                Gerencie todos os eventos aprovados do buffet.
            </p>

        </div>

        <div class="col-md-6 text-end">

            <a href="{{ route('admin.eventos.create') }}" class="btn btn-warning shadow-sm">
                <i class="fas fa-plus me-2"></i>
                Novo Evento
            </a>

        </div>

    </div>

    {{-- CARD TABLE --}}
    <div class="card border-0 shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Evento</th>
                            <th>Data</th>
                            <th>Pessoas</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th width="650">Gerenciamento</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($eventos as $evento)

                            <tr>

                                <td>
                                    <strong>#{{ $evento->id }}</strong>
                                </td>

                                <td>
                                    <strong>{{ $evento->cliente }}</strong>
                                </td>

                                <td>
                                    {{ $evento->tipo_evento }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ $evento->convidados }}
                                </td>

                                <td>
                                    <span class="fw-bold text-success">
                                        R$ {{ number_format($evento->valor, 2, ',', '.') }}
                                    </span>
                                </td>

                                <td>
                                    @php
                                        $status = [
                                            'confirmado' => 'success',
                                            'finalizado' => 'primary',
                                            'cancelado' => 'danger',
                                        ];
                                    @endphp

                                    <span class="badge bg-{{ $status[$evento->status] ?? 'warning' }}">
                                        {{ ucfirst($evento->status) }}
                                    </span>
                                </td>

                                {{-- AÇÕES --}}
                                <td>

                                    <div class="d-flex flex-wrap align-items-center gap-2">

                                        {{-- STATUS UPDATE --}}
                                        <form action="{{ route('admin.eventos.status', $evento->id) }}"
                                              method="POST"
                                              class="d-flex gap-2">

                                            @csrf
                                            @method('PUT')

                                            <select name="status"
                                                    class="form-select form-select-sm"
                                                    style="width:150px">

                                                <option value="confirmado"
                                                    {{ $evento->status == 'confirmado' ? 'selected' : '' }}>
                                                    Confirmado
                                                </option>

                                                <option value="finalizado"
                                                    {{ $evento->status == 'finalizado' ? 'selected' : '' }}>
                                                    Finalizado
                                                </option>

                                                <option value="cancelado"
                                                    {{ $evento->status == 'cancelado' ? 'selected' : '' }}>
                                                    Cancelado
                                                </option>

                                            </select>

                                            <button type="submit"
                                                    class="btn btn-success btn-sm"
                                                    title="Salvar Status">
                                                <i class="fas fa-save"></i>
                                            </button>

                                        </form>

                                        {{-- DETALHES --}}
                                        <a href="{{ route('admin.eventos.show', $evento->id) }}"
                                           class="btn btn-info btn-sm"
                                           title="Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        {{-- EDITAR --}}
                                        <a href="{{ route('admin.eventos.edit', $evento->id) }}"
                                           class="btn btn-primary btn-sm"
                                           title="Editar Evento">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- PDF --}}
                                        <a href="{{ route('admin.orcamento.pdf', $evento->id) }}"
                                           class="btn btn-warning btn-sm"
                                           target="_blank"
                                           title="Gerar PDF">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('admin.eventos.destroy', $evento->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este evento?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Excluir">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center p-5">
                                    Nenhum evento encontrado.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PAGINAÇÃO --}}
            @if (method_exists($eventos, 'links'))
                <div class="mt-4">
                    {{ $eventos->links() }}
                </div>
            @endif

        </div>

    </div>

</div>
@endsection