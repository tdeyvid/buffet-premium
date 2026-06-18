@extends('layouts.admin')

@section('content')

<div class="container">

    @php

    $status = strtolower(trim($reserva->status));

    $statusClasse = match($status){

        'pendente' => 'status-pendente',
        'analise' => 'status-analise',
        'confirmada' => 'status-confirmada',
        'cancelada' => 'status-cancelada',
        'finalizada' => 'status-finalizada',

        default => 'status-default'
    };


    $icone = match($status){

        'pendente'=>'⏳',
        'analise'=>'🔎',
        'confirmada'=>'✅',
        'cancelada'=>'❌',
        'finalizada'=>'🏁',

        default=>'•'
    };

    @endphp


    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">

            <h4 class="mb-0">📋 Detalhes da Reserva</h4>
        </div>

        <div class="card-body">

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="info-box">

                        <strong>👤 Cliente</strong>

                        <div>

                            {{ $reserva->cliente }}

                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <strong>📞 Telefone</strong>

                        <div>

                            {{ $reserva->telefone }}

                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <strong>📅 Data da Reserva</strong>

                        <div>

                            {{ date('d/m/Y',strtotime($reserva->data_reserva)) }}

                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <strong>👥 Pessoas</strong>

                        <div>
                            {{ $reserva->quantidade_pessoas }}

                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <strong>🕒 Criada em</strong>

                        <div>
                            {{ date('d/m/Y H:i',strtotime($reserva->created_at)) }}
                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <strong>Status</strong>

                        <div class="mt-2">

                            <span class="status-pill {{ $statusClasse }}">

                                {{ $icone }}

                                {{ ucfirst($status) }}

                            </span>

                        </div>

                    </div>

                </div>

                <div class="col-12">

                    <div class="info-box">

                        <strong>📝 Mensagem</strong>

                        <div class="mt-2"> 
                            {{ $reserva->mensagem ?? 'Nenhuma mensagem informada.' }}

                        </div>

                    </div>

                </div>

            </div>


            <div class="mt-4 d-flex gap-2">

                <a href="{{ route('admin.reservas.index') }}"
                    class="btn btn-secondary"> ← Voltar 
                </a>

            </div>

        </div>

    </div>

</div>


@endsection