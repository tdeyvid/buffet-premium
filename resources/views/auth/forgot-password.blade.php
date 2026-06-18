@extends('layouts.app')

@section('content')

<section class="min-vh-100 d-flex align-items-center position-relative overflow-hidden py-5 mt-5">

    {{-- BACKGROUND --}}
    <div class="position-absolute top-0 inset-s-0 w-100 h-100">

        <img
            src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1800"
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

                            Recuperação de senha do sistema

                        </p>

                    </div>


                    {{-- TEXTO --}}
                    <div class="mb-4 text-center text-light">

                        Esqueceu sua senha? Informe seu email abaixo
                        e enviaremos um link para redefinição.

                    </div>


                    {{-- STATUS --}}
                    <x-auth-session-status
                        class="mb-4 text-success"
                        :status="session('status')" />


                    {{-- FORM --}}
                    <form method="POST"
                        action="{{ route('password.email') }}">

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
                                placeholder="Digite seu email"
                                class="form-control bg-dark border-secondary text-white rounded-4 py-3">

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2 text-danger" />

                        </div>


                        {{-- BOTÃO --}}
                        <div class="d-grid mb-4">

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill fw-bold py-3 shadow">

                                Enviar Link de Recuperação

                            </button>

                        </div>

                    </form>


                    {{-- VOLTAR LOGIN --}}
                    <div class="text-center">

                        <a href="{{ route('login') }}"
                            class="btn btn-outline-light rounded-pill px-4 py-2">

                            Voltar ao Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection