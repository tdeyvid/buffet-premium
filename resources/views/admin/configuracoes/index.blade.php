@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="glass rounded-5 p-4 shadow mb-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold text-white mb-1">
                    <i class="fas fa-cogs text-warning me-2"></i>
                    Configurações do Site
                </h2>

                <small class="text-secondary">
                    Gerencie as informações exibidas no site
                </small>

            </div>

        </div>

    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <div class="glass rounded-5 p-4 shadow">

        <form
            method="POST"
            action="{{ route('admin.configuracoes.update') }}"
        >

            @csrf

            <div class="row g-4">

                {{-- NOME EMPRESA --}}
                <div class="col-md-6">

                    <label class="form-label text-white fw-semibold">
                        Nome da Empresa
                    </label>

                    <input
                        type="text"
                        name="nome_empresa"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        value="{{ $configuracao->nome_empresa ?? '' }}"
                        placeholder="Digite o nome da empresa"
                    >

                </div>

                {{-- TELEFONE --}}
                <div class="col-md-6">

                    <label class="form-label text-white fw-semibold">
                        Telefone
                    </label>

                    <input
                        type="text"
                        name="telefone"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        value="{{ $configuracao->telefone ?? '' }}"
                        placeholder="(79) 9999-9999"
                    >

                </div>

                {{-- WHATSAPP --}}
                <div class="col-md-6">

                    <label class="form-label text-white fw-semibold">
                        WhatsApp
                    </label>

                    <input
                        type="text"
                        name="whatsapp"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        value="{{ $configuracao->whatsapp ?? '' }}"
                        placeholder="(79) 99999-9999"
                    >

                </div>

                {{-- EMAIL --}}
                <div class="col-md-6">

                    <label class="form-label text-white fw-semibold">
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        value="{{ $configuracao->email ?? '' }}"
                        placeholder="contato@empresa.com"
                    >

                </div>

                {{-- ENDEREÇO --}}
                <div class="col-md-12">

                    <label class="form-label text-white fw-semibold">
                        Endereço
                    </label>

                    <input
                        type="text"
                        name="endereco"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        value="{{ $configuracao->endereco ?? '' }}"
                        placeholder="Digite o endereço completo"
                    >

                </div>

                {{-- INSTAGRAM --}}
                <div class="col-md-6">

                    <label class="form-label text-white fw-semibold">
                        Instagram
                    </label>

                    <input
                        type="text"
                        name="instagram"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        value="{{ $configuracao->instagram ?? '' }}"
                        placeholder="https://instagram.com/seuperfil"
                    >

                </div>

                {{-- FACEBOOK --}}
                <div class="col-md-6">

                    <label class="form-label text-white fw-semibold">
                        Facebook
                    </label>

                    <input
                        type="text"
                        name="facebook"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        value="{{ $configuracao->facebook ?? '' }}"
                        placeholder="https://facebook.com/suapagina"
                    >

                </div>

                {{-- RODAPÉ --}}
                <div class="col-md-12">

                    <label class="form-label text-white fw-semibold">
                        Texto do Rodapé
                    </label>

                    <textarea
                        name="rodape"
                        rows="5"
                        class="form-control bg-dark text-white border-secondary rounded-4"
                        placeholder="Digite o texto que aparecerá no rodapé do site..."
                    >{{ $configuracao->rodape ?? '' }}</textarea>

                </div>

            </div>

            <div class="mt-4 text-end">

                <button
                    type="submit"
                    class="btn btn-warning rounded-pill px-5 fw-bold"
                >
                    <i class="fas fa-save me-2"></i>
                    Salvar Configurações
                </button>

            </div>

        </form>

    </div>

</div>

@endsection