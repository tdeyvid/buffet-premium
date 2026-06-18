@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

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

                                        <strong>

                                            {{ $evento->cliente }}
                                            

                                        </strong>

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

                                        @if ($evento->status == 'confirmado')
                                            <span class="badge bg-success">

                                                <i class="fas fa-check-circle me-1"></i>

                                                Confirmado

                                            </span>
                                        @elseif($evento->status == 'finalizado')
                                            <span class="badge bg-primary">

                                                <i class="fas fa-flag-checkered me-1"></i>

                                                Finalizado

                                            </span>
                                        @elseif($evento->status == 'cancelado')
                                            <span class="badge bg-danger">

                                                <i class="fas fa-times-circle me-1"></i>

                                                Cancelado

                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark">

                                                <i class="fas fa-clock me-1"></i>

                                                Pendente

                                            </span>
                                        @endif

                                    </td>

                                    <td>

                                        <div class="d-flex flex-wrap align-items-center gap-2">

                                            <form action="{{ route('admin.eventos.status', $evento->id) }}" method="POST"
                                                class="d-flex gap-2">

                                                @csrf
                                                @method('PUT')

                                                <select name="status" class="form-select form-select-sm"
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

                                                <button type="submit" class="btn btn-success btn-sm" title="Salvar Status">

                                                    <i class="fas fa-save"></i>

                                                </button>

                                            </form>

                                            <a href="{{ route('admin.eventos.show', $evento->id) }}"
                                                class="btn btn-info btn-sm" title="Detalhes">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                            <a href="{{ route('admin.eventos.edit', $evento->id) }}"
                                                class="btn btn-primary btn-sm" title="Editar Evento">

                                                <i class="fas fa-edit"></i>

                                            </a>

                                            <a href="{{ route('admin.orcamento.pdf', $evento->id) }}"
                                                class="btn btn-warning btn-sm" title="Gerar PDF">

                                                <i class="fas fa-file-pdf"></i>

                                            </a>
                                            
    
                           

                                            <form action="{{ route('admin.eventos.destroy', $evento->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="confirmarExclusao(event, this.form)">
                                                    Excluir
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

                @if (method_exists($eventos, 'links'))
                    <div class="mt-4">

                        {{ $eventos->links() }}

                    </div>
                @endif

            </div>

        </div>

    </div>
@endsection
