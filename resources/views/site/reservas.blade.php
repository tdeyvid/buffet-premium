@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    <section class="position-relative overflow-hidden">

        <div class="position-absolute top-0 start w-100 h-100">

           <img src="{{ asset('storage/buffet.jpg') }}" class="w-100 h-100"
                style="object-fit:cover; filter:brightness(0.25);">

        </div>

        <div class="container position-relative z-2 py-5">

            <div class="row align-items-center min-vh-100">

                {{-- TEXTO --}}
                <div class="col-lg-6 text-white">


                    <span class="badge bg-warning text-dark px-4 py-2 rounded-pill mb-3 fw-bold fs-5">
                        Reservas Premium
                    </span>

                    <h1 class="display-3 fw-bold mb-4"> Reserve Seu Evento Com Elegância</h1>

                    <p class="lead text-emphasis mb-5">

                        Casamentos, aniversários, formaturas e eventos corporativos
                        com gastronomia sofisticada, decoração premium
                        e atendimento exclusivo.

                    </p>

                    <div class="d-flex flex-wrap gap-3">

                        <div class="glass px-4 py-3 rounded-4">

                            <h4 class="text-warning fw-bold mb-0">+500 </h4>

                            <small class="text-light">Eventos Realizados</small>

                        </div>

                        <div class="glass px-4 py-3 rounded-4">

                            <h4 class="text-warning fw-bold mb-0">

                                +20k

                            </h4>

                            <small class="text-light">

                                Clientes Satisfeitos

                            </small>

                        </div>

                    </div>

                </div>

                {{-- FORM --}}
                <div class="col-lg-5 offset-lg-1 mt-5 mt-lg-0">

                    <div class="glass rounded-5 p-4 shadow-lg border border-light border-opacity-10">

                        <div class="text-center mb-3">

                            <h2 class="fw-bold text-white mb-1">

                                Solicitar Orçamento

                            </h2>

                            <p class="text-light small mb-0">

                                Preencha os dados do seu evento

                            </p>

                        </div>

                        {{-- ALERTA --}}
                        @if (session('success'))
                            <div class="alert alert-success rounded-4 mb-3">

                                {{ session('success') }}

                            </div>
                        @endif


                        {{-- FORMULÁRIO --}}
                        <form action="{{ route('reservas.store') }}" method="POST">

                            @csrf

                            <div class="row">

                                {{-- NOME --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label text-white fw-semibold small mb-1">

                                        Nome Completo

                                    </label>

                                    <input type="text" name="nome"
                                        value="{{ old('nome', auth()->check() ? auth()->user()->name : '') }}"
                                        class="form-control bg-dark border-secondary text-white rounded-4 py-2" required>

                                </div>

                                {{-- TELEFONE --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label text-white fw-semibold small mb-1">

                                        Telefone

                                    </label>

                                    <input type="text" name="telefone" value="{{ old('telefone') }}"
                                        class="form-control bg-dark border-secondary text-white rounded-4 py-2" required>

                                </div>

                                {{-- DATA --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label text-white fw-semibold small mb-1">

                                        Data do Evento

                                    </label>

                                    <input type="date" min="{{ date('Y-m-d') }}" name="data_reserva"
                                        value="{{ old('data_reserva') }}"
                                        class="form-control bg-dark border-secondary text-white rounded-4 py-2" required>

                                </div>

                                {{-- PESSOAS --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label text-white fw-semibold small mb-1">

                                        Quantidade de Pessoas

                                    </label>

                                    <input type="number" name="quantidade_pessoas" value="{{ old('quantidade_pessoas') }}"
                                        class="form-control bg-dark border-secondary text-white rounded-4 py-2" required>

                                </div>

                                {{-- TIPO --}}
                                <div class="mb-3">

                                    <label class="form-label text-white fw-semibold small mb-1">

                                        Tipo do Evento

                                    </label>

                                    <select name="tipo_evento"
                                        class="form-select bg-dark border-secondary text-white rounded-4 py-2" required>

                                        <option value="Casamento">Casamento</option>
                                        <option value="Aniversário">Aniversário</option>
                                        <option value="Corporativo">Corporativo</option>
                                        <option value="Formatura">Formatura</option>
                                        <option value="15 Anos">Festa de 15 Anos</option>

                                    </select>

                                </div>

                                {{-- MENSAGEM --}}
                                <div class="mb-3">

                                    <label class="form-label text-white fw-semibold small mb-1">

                                        Mensagem

                                    </label>

                                    <textarea name="mensagem" rows="3" class="form-control bg-dark border-secondary text-white rounded-4"
                                        placeholder="Conte mais detalhes sobre o evento...">{{ old('mensagem') }}</textarea>

                                </div>

                                {{-- BOTÃO --}}
                                <div class="text-center mt-2">

                                    <button type="submit" class="btn btn-warning rounded-pill px-4 py-2 fw-bold shadow">

                                        Solicitar Reserva

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
