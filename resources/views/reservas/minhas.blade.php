@extends('layouts.app')

@section('content')
    <div class="container py-4 mt-5">

        <h3 class="fw-bold mb-4 mt-4">
            Minhas Reservas
        </h3>

        @foreach ($reservas as $reserva)
            <div class="card mb-3 shadow-sm">

                <div class="card-body">

                    <h5>{{ $reserva->tipo_evento }}</h5>

                    <p>
                        Data:
                        {{ \Carbon\Carbon::parse($reserva->data_reserva)->format('d/m/Y') }}
                    </p>

                    <p>
                        Pessoas:
                        {{ $reserva->quantidade_pessoas }}
                    </p>

                    <p>
                        Messagem:
                        {{ $reserva->mensagem }}
                    </p>

                    <p>
                        Status:
                        {{ $reserva->status }}
                    </p>

                    <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning">

                        Editar

                    </a>
                    <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="d-inline"
                        onsubmit="return confirmarExclusaoReserva(event, this)">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Excluir
                        </button>

                    </form>

                </div>

            </div>
        @endforeach

    </div>
@endsection
