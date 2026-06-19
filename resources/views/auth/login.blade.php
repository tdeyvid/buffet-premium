@extends('layouts.app')

@section('content')

<section class="min-vh-100 d-flex align-items-center position-relative overflow-hidden py-5 mt-5">

    {{-- BACKGROUND --}}
    <div class="position-absolute top-0 inset-s-0 w-100 h-100">
        
        <img src="{{ asset('storage/buffet.jpg') }}"
            class="w-100 h-100"
            style="object-fit:cover; filter:brightness(0.25);">

    </div>

    <div class="container position-relative py-5">

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

                            Entre na sua conta para acessar reservas,
                            pedidos e recursos do sistema.

                        </p>

                    </div>


                    {{-- STATUS --}}
                    <x-auth-session-status
                        class="mb-4 text-success"
                        :status="session('status')" />


                    {{-- FORM --}}
                    <form method="POST"
                        action="{{ route('login') }}">

                        @csrf


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
                                autofocus
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
                                autocomplete="current-password"
                                placeholder="Digite sua senha"
                                class="form-control bg-dark border-secondary text-white rounded-4 py-3">

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2 text-danger" />

                        </div>


                        {{-- LEMBRAR --}}
                        <div class="form-check mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember_me">

                            <label
                                class="form-check-label text-light"
                                for="remember_me">

                                Lembrar de mim

                            </label>

                        </div>


                        {{-- BOTÃO --}}
                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill fw-bold py-3 shadow">

                                Entrar

                            </button>

                        </div>


                        {{-- ESQUECEU SENHA --}}
                        @if (Route::has('password.request'))

                            <div class="text-center mt-4">

                                <a href="{{ route('password.request') }}"
                                    class="text-light text-decoration-none">

                                    Esqueceu sua senha?

                                </a>

                            </div>

                        @endif

                    </form>


                    {{-- CADASTRO --}}
                    <div class="text-center mt-5">

                        <p class="text-light mb-3">

                            Ainda não possui conta?

                        </p>

                        <a href="{{ route('register') }}"
                            class="btn btn-outline-light rounded-pill px-4 py-2">

                            Criar Conta

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection