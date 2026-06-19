
@extends('layouts.app')

@section('content')

<section class="min-vh-100 bg-dark text-white py-5 mt-5 position-relative overflow-hidden">

    {{-- BACKGROUND --}}
    <div class="position-absolute top-0 start w-100 h-100">

        <img src="{{ asset('storage/buffet.jpg') }}"
            class="w-100 h-100"
            style="object-fit:cover; filter:brightness(0.18);">

    </div>

    <div class="container position-relative z-2 py-5">

        {{-- TOPO --}}
        <div class="text-center mb-5">

            <h1 class="display-5 fw-bold mb-3">

                Minha Conta

            </h1>

            <p class="text-light fs-5">

                Gerencie suas informações pessoais e mantenha sua conta segura.

            </p>

        </div>

        <div class="row justify-content-center g-4">

            {{-- PERFIL --}}
            <div class="col-lg-8">

                <div class="profile-card p-4 p-lg-5 rounded-5 shadow-lg">

                    <div class="d-flex align-items-center mb-4">

                        <div class="profile-icon bg-warning text-dark me-3">

                            <i class="bi bi-person-fill"></i>

                        </div>

                        <div>

                            <h3 class="fw-bold mb-1 text-white">

                                Informações do Perfil

                            </h3>

                            <p class="text-light mb-0">

                                Atualize seus dados pessoais.

                            </p>

                        </div>

                    </div>

                    <form method="post" action="{{ route('profile.update') }}">

                        @csrf
                        @method('patch')

                        {{-- NOME --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold">

                                Nome Completo

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="form-control profile-input"
                                required>

                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold">

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                class="form-control profile-input"
                                required>

                        </div>

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill fw-bold py-3">

                                <i class="bi bi-check-circle-fill me-2"></i>

                                Salvar Alterações

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            {{-- SENHA --}}
            <div class="col-lg-8">

                <div class="profile-card p-4 p-lg-5 rounded-5 shadow-lg">

                    <div class="d-flex align-items-center mb-4">

                        <div class="profile-icon bg-danger text-white me-3">

                            <i class="bi bi-shield-lock-fill"></i>

                        </div>

                        <div>

                            <h3 class="fw-bold mb-1 text-white">

                                Segurança da Conta

                            </h3>

                            <p class="text-light mb-0">

                                Atualize sua senha de acesso.

                            </p>

                        </div>

                    </div>

                    <form method="post" action="{{ route('password.update') }}">

                        @csrf
                        @method('put')

                        {{-- SENHA ATUAL --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold">

                                Senha Atual

                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control profile-input"
                                required>

                        </div>

                        {{-- NOVA SENHA --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold">

                                Nova Senha

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control profile-input"
                                required>

                        </div>

                        {{-- CONFIRMAR --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold">

                                Confirmar Nova Senha

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control profile-input"
                                required>

                        </div>

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-danger rounded-pill fw-bold py-3">

                                <i class="bi bi-shield-check me-2"></i>

                                Atualizar Senha

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            {{-- EXCLUIR CONTA --}}
            <div class="col-lg-8">

                <div class="profile-card border border-danger border-opacity-50 p-4 p-lg-5 rounded-5 shadow-lg">

                    <div class="d-flex align-items-center mb-4">

                        <div class="profile-icon bg-danger text-white me-3">

                            <i class="bi bi-trash-fill"></i>

                        </div>

                        <div>

                            <h3 class="fw-bold mb-1 text-danger">

                                Excluir Conta

                            </h3>

                            <p class="text-light mb-0">

                                Esta ação é permanente e não poderá ser desfeita.

                            </p>

                        </div>

                    </div>

                    <form method="post" action="{{ route('profile.destroy') }}">

                        @csrf
                        @method('delete')

                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold">

                                Digite sua senha para confirmar

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control profile-input"
                                required>

                        </div>

                        <div class="d-grid">
                            <button type="button" onclick="confirmarExclusaoConta(this.form)"
                                class="btn btn-outline-danger rounded-pill fw-bold py-3">
                                 <i class="bi bi-trash3-fill me-2"></i> 
                                 Excluir Minha Conta 
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

