@extends('layouts.admin')

@section('content')

<div class="glass rounded-5 p-5 shadow">

    <div class="mb-5">
        <h1 class="fw-bold text-white mb-1">
            Novo Evento
        </h1>

        <small class="text-secondary">
            Cadastre um novo evento no sistema
        </small>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.eventos.store') }}" method="POST">
        @csrf

        <div class="row">

            {{-- CLIENTE --}}
            <div class="col-md-6 mb-3">
                <label class="form-label text-white fw-semibold">
                    Cliente
                </label>

                <input
                    type="text"
                    name="cliente"
                    value="{{ old('cliente') }}"
                    class="form-control bg-dark text-white border-secondary rounded-4"
                    style="height:48px;"
                    placeholder="Nome do cliente"
                    required
                >
            </div>

            {{-- TELEFONE --}}
            <div class="col-md-6 mb-3">
                <label class="form-label text-white fw-semibold">
                    Telefone
                </label>

                <input
                    type="text"
                    name="telefone"
                    value="{{ old('telefone') }}"
                    class="form-control bg-dark text-white border-secondary rounded-4"
                    style="height:48px;"
                    placeholder="(79) 99999-9999"
                >
            </div>

            {{-- TIPO EVENTO --}}
            <div class="col-md-6 mb-3">
                <label class="form-label text-white fw-semibold">
                    Tipo de Evento
                </label>

                <select
                    name="tipo_evento"
                    class="form-select bg-dark text-white border-secondary rounded-4"
                    style="height:48px;"
                    required
                >
                    <option value="">Selecione...</option>

                    <option value="Casamento"
                        {{ old('tipo_evento') == 'Casamento' ? 'selected' : '' }}>
                        Casamento
                    </option>

                    <option value="Aniversário"
                        {{ old('tipo_evento') == 'Aniversário' ? 'selected' : '' }}>
                        Aniversário
                    </option>

                    <option value="Corporativo"
                        {{ old('tipo_evento') == 'Corporativo' ? 'selected' : '' }}>
                        Corporativo
                    </option>

                    <option value="Formatura"
                        {{ old('tipo_evento') == 'Formatura' ? 'selected' : '' }}>
                        Formatura
                    </option>

                    <option value="Festa de 15 anos"
                        {{ old('tipo_evento') == 'Festa de 15 anos' ? 'selected' : '' }}>
                        Festa de 15 anos
                    </option>
                </select>
            </div>

            {{-- DATA EVENTO --}}
            <div class="col-md-6 mb-3">
                <label class="form-label text-white fw-semibold">
                    Data do Evento
                </label>

                <input
                    type="date"
                    name="data_evento"
                    value="{{ old('data_evento') }}"
                    class="form-control bg-dark text-white border-secondary rounded-4"
                    style="height:48px;"
                    required
                >
            </div>

            {{-- CONVIDADOS --}}
            <div class="col-md-6 mb-3">
                <label class="form-label text-white fw-semibold">
                    Quantidade de Convidados
                </label>

                <input
                    type="number"
                    min="1"
                    name="convidados"
                    value="{{ old('convidados') }}"
                    class="form-control bg-dark text-white border-secondary rounded-4"
                    style="height:48px;"
                    placeholder="Ex: 150"
                    required
                >
            </div>

            {{-- VALOR --}}
            <div class="col-md-6 mb-3">
                <label class="form-label text-white fw-semibold">
                    Valor (R$)
                </label>

                <input
                    type="number"
                    step="0.01"
                    min="0"
                    name="valor"
                    value="{{ old('valor') }}"
                    class="form-control bg-dark text-white border-secondary rounded-4"
                    style="height:48px;"
                    placeholder="0.00"
                    required
                >
            </div>

            {{-- DESCRIÇÃO --}}
            <div class="col-12 mb-3">
                <label class="form-label text-white fw-semibold">
                    Descrição
                </label>

                <textarea
                    name="descricao"
                    rows="4"
                    class="form-control bg-dark text-white border-secondary rounded-4"
                    placeholder="Digite detalhes do evento..."
                >{{ old('descricao') }}</textarea>
            </div>

            {{-- OBSERVAÇÕES --}}
            <div class="col-12 mb-4">
                <label class="form-label text-white fw-semibold">
                    Observações
                </label>

                <textarea
                    name="observacoes"
                    rows="3"
                    class="form-control bg-dark text-white border-secondary rounded-4"
                    placeholder="Informações adicionais..."
                >{{ old('observacoes') }}</textarea>
            </div>

            {{-- BOTÕES --}}
            <div class="text-center">

                <a
                    href="{{ route('admin.eventos.index') }}"
                    class="btn btn-outline-light rounded-pill px-5 me-2"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="btn btn-warning rounded-pill px-5 fw-bold"
                >
                    <i class="fas fa-save me-2"></i>
                    Salvar Evento
                </button>

            </div>

        </div>
    </form>

</div>

@endsection