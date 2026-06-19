@extends('layouts.app')

@section('content')

<section class="min-vh-100 d-flex align-items-center position-relative overflow-hidden py-5 mt-5">

    {{-- BACKGROUND --}}
    <div class="position-absolute top-0 inset-s-0 w-100 h-100">
        <img src="{{ asset('storage/buffet.jpg') }}"
            class="w-100 h-100"
            style="object-fit:cover; filter:brightness(0.25);">

    </div>

    <div class="container position-relative z-2 py-5">

        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="glass rounded-5 p-5 shadow-lg border border-light border-opacity-10">

                    {{-- LOGO --}}
                    <div class="text-center mb-4">

                        <h1 class="fw-bold text-white display-6 mb-0">

                            Sítio Vitória

                        </h1>

                        <span
                            class="text-warning text-uppercase fw-semibold"
                            style="letter-spacing:4px;font-size:.85rem;">

                            Buffet • Decorações

                        </span>

                        <p class="text-light mt-3">

                            Crie sua conta para acessar o sistema premium

                        </p>

                    </div>


                    {{-- FORM --}}
                    <form method="POST"
                        action="{{ route('register') }}">

                        @csrf


                        {{-- NOME --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold mb-2">

                                Nome Completo

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Digite seu nome"
                                class="form-control bg-dark border-secondary text-white rounded-4 py-3">

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2 text-danger" />

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold mb-2">

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="Digite seu email"
                                class="form-control bg-dark border-secondary text-white rounded-4 py-3">

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2 text-danger" />

                        </div>


                        {{-- SENHA --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold mb-2">

                                Senha

                            </label>

                            <input
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Digite sua senha"
                                class="form-control bg-dark border-secondary text-white rounded-4 py-3">

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2 text-danger" />

                        </div>


                        {{-- CONFIRMAR SENHA --}}
                        <div class="mb-4">

                            <label class="form-label text-white fw-semibold mb-2">

                                Confirmar Senha

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirme sua senha"
                                class="form-control bg-dark border-secondary text-white rounded-4 py-3">

                            <x-input-error
                                :messages="$errors->get('password_confirmation')"
                                class="mt-2 text-danger" />

                        </div>


                        {{-- BOTÃO --}}
                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill fw-bold py-3 shadow">

                                Criar Conta

                            </button>

                        </div>

                    </form>


                    {{-- LOGIN --}}
                    <div class="text-center mt-5">

                        <p class="text-light mb-3">

                            Já possui uma conta?

                        </p>

                        <a href="{{ route('login') }}"
                            class="btn btn-outline-light rounded-pill px-4 py-2">

                            Fazer Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection