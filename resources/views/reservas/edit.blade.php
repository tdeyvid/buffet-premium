@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h3 class="mb-0">
                Editar Reserva
            </h3>

        </div>

        <div class="card-body">

            <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Data da Reserva
                    </label>

                    <input type="date"
                           name="data_reserva"
                           min="{{ date('Y-m-d') }}"
                           value="{{ old('data_reserva', $reserva->data_reserva) }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Quantidade de Pessoas
                    </label>

                    <input type="number"
                           name="quantidade_pessoas"
                           value="{{ old('quantidade_pessoas', $reserva->quantidade_pessoas) }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tipo de Evento
                    </label>

                    <select name="tipo_evento" class="form-select">

                        <option value="Casamento"
                            {{ $reserva->tipo_evento == 'Casamento' ? 'selected' : '' }}>
                            Casamento
                        </option>

                        <option value="Aniversário"
                            {{ $reserva->tipo_evento == 'Aniversário' ? 'selected' : '' }}>
                            Aniversário
                        </option>

                        <option value="Corporativo"
                            {{ $reserva->tipo_evento == 'Corporativo' ? 'selected' : '' }}>
                            Corporativo
                        </option>

                        <option value="Formatura"
                            {{ $reserva->tipo_evento == 'Formatura' ? 'selected' : '' }}>
                            Formatura
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mensagem
                    </label>

                    <textarea name="mensagem"
                              rows="4"
                              class="form-control">{{ old('mensagem', $reserva->mensagem) }}</textarea>

                </div>

                <button class="btn btn-warning">

                    Salvar Alterações

                </button>

                <a href="{{ route('reservas.minhas') }}"
                   class="btn btn-secondary">

                    Voltar

                </a>

            </form>

        </div>

    </div>

</div>

@endsection