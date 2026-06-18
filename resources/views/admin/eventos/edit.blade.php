@extends('layouts.admin')

@section('content')

<div class="container-fluid">


{{-- CABEÇALHO --}}
<div class="glass rounded-5 p-4 shadow mb-4">

    <div class="d-flex justify-content-between align-items-center flex-wrap">

        <div>
            <h2 class="fw-bold text-white mb-1">
                Editar Evento #{{ $evento->id }}
            </h2>

            <small class="text-secondary">
                Atualize as informações do evento
            </small>
        </div>

        <a href="{{ route('admin.eventos.index') }}"
           class="btn btn-outline-light rounded-pill px-4">

            <i class="fas fa-arrow-left me-2"></i>
            Voltar

        </a>

    </div>

</div>

{{-- ERROS --}}
@if ($errors->any())

    <div class="alert alert-danger rounded-4">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

{{-- FORMULÁRIO --}}
<div class="glass rounded-5 p-4 shadow">

    <form action="{{ route('admin.eventos.update', $evento->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        {{-- DADOS DO CLIENTE --}}
        <div class="mb-4">

            <h5 class="text-warning fw-bold mb-3">

                <i class="fas fa-user me-2"></i>
                Dados do Cliente

            </h5>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label text-white fw-semibold">
                        Cliente
                    </label>

                    <input
                        type="text"
                        name="cliente"
                        value="{{ old('cliente', $evento->cliente) }}"
                        class="form-control bg-dark text-white border-secondary rounded-4">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label text-white fw-semibold">
                        Telefone
                    </label>

                    <input type="text" name="telefone"
                        value="{{ old('telefone', $evento->telefone) }}"
                        class="form-control bg-dark text-white border-secondary rounded-4">

                </div>

            </div>

        </div>

        {{-- DADOS DO EVENTO --}}
        <div class="mb-4">

            <h5 class="text-warning fw-bold mb-3">

                <i class="fas fa-calendar-alt me-2"></i>
                Informações do Evento

            </h5>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label text-white fw-semibold">
                        Tipo do Evento
                    </label>

                    <select
                        name="tipo_evento"
                        class="form-select bg-dark text-white border-secondary rounded-4">

                        <option value="Casamento"
                            {{ old('tipo_evento', $evento->tipo_evento) == 'Casamento' ? 'selected' : '' }}>
                            Casamento
                        </option>

                        <option value="Aniversário"
                            {{ old('tipo_evento', $evento->tipo_evento) == 'Aniversário' ? 'selected' : '' }}>
                            Aniversário
                        </option>

                        <option value="Corporativo"
                            {{ old('tipo_evento', $evento->tipo_evento) == 'Corporativo' ? 'selected' : '' }}>
                            Corporativo
                        </option>

                        <option value="Formatura"
                            {{ old('tipo_evento', $evento->tipo_evento) == 'Formatura' ? 'selected' : '' }}>
                            Formatura
                        </option>

                        <option value="Festa de 15 anos"
                            {{ old('tipo_evento', $evento->tipo_evento) == 'Festa de 15 anos' ? 'selected' : '' }}>
                            Festa de 15 anos
                        </option>

                    </select>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label text-white fw-semibold">
                        Data do Evento
                    </label>

                    <input
                        type="date"
                        name="data_evento"
                        value="{{ old('data_evento', $evento->data_evento) }}"
                        class="form-control bg-dark text-white border-secondary rounded-4">

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label text-white fw-semibold">
                        Quantidade de Convidados
                    </label>

                    <input
                        type="number"
                        min="1"
                        name="convidados"
                        value="{{ old('convidados', $evento->convidados) }}"
                        class="form-control bg-dark text-white border-secondary rounded-4">

                </div>

            </div>

        </div>

        {{-- VALOR E STATUS --}}
        <div class="mb-4">

            <h5 class="text-warning fw-bold mb-3">

                <i class="fas fa-money-bill-wave me-2"></i>
                Financeiro e Status

            </h5>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label text-white fw-semibold">
                        Valor do Evento (R$)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="valor"
                        value="{{ old('valor', $evento->valor) }}"
                        class="form-control bg-dark text-white border-secondary rounded-4">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label text-white fw-semibold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select bg-dark text-white border-secondary rounded-4">

                        <option value="confirmado"
                            {{ old('status', $evento->status) == 'confirmado' ? 'selected' : '' }}>
                            Confirmado
                        </option>

                        <option value="finalizado"
                            {{ old('status', $evento->status) == 'finalizado' ? 'selected' : '' }}>
                            Finalizado
                        </option>

                        <option value="cancelado"
                            {{ old('status', $evento->status) == 'cancelado' ? 'selected' : '' }}>
                            Cancelado
                        </option>

                    </select>

                </div>

            </div>

        </div>

        {{-- DESCRIÇÃO --}}
        <div class="mb-4">

            <label class="form-label text-white fw-semibold">
                Descrição
            </label>

            <textarea
                name="descricao"
                rows="5"
                class="form-control bg-dark text-white border-secondary rounded-4">{{ old('descricao', $evento->descricao) }}</textarea>

        </div>

        {{-- OBSERVAÇÕES --}}
        <div class="mb-4">

            <label class="form-label text-white fw-semibold">
                Observações Internas
            </label>

            <textarea
                name="observacoes"
                rows="4"
                class="form-control bg-dark text-white border-secondary rounded-4">{{ old('observacoes', $evento->observacoes) }}</textarea>

        </div>

        {{-- BOTÕES --}}
        <div class="text-center mt-4">

            <button
                type="submit"
                class="btn btn-success rounded-pill px-5 fw-bold me-2">

                <i class="fas fa-save me-2"></i>
                Salvar Alterações

            </button>

            <a href="{{ route('admin.eventos.index') }}"
               class="btn btn-outline-light rounded-pill px-5">

                Cancelar

            </a>

        </div>

    </form>

</div>

</div>

@endsection
