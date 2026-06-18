@extends('layouts.app')

@section('content')

<section class="min-vh-100 d-flex align-items-center position-relative overflow-hidden py-5 mt-5">

    {{-- BACKGROUND --}}
    <div class="position-absolute top-0 inset-s-0 w-100 h-100">

        <img
            src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=1800"
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

                            Confirmação de Segurança

                        </p>

                    </div>


                    {{-- TEXTO --}}
                    <div class="mb-4 text-center text-light">

                        Esta é uma área protegida do sistema.

                        <br><br>

                        Confirme sua senha para continuar.

                    </div>


                    {{-- FORM --}}
                    <form method="POST"
                        action="{{ route('password.confirm') }}">

                        @csrf


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


                        {{-- BOTÃO --}}
                        <div class="d-grid mb-4">

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill fw-bold py-3 shadow">

                                Confirmar Senha

                            </button>

                        </div>

                    </form>


                    {{-- VOLTAR --}}
                    <div class="text-center">

                        <a href="{{ route('dashboard') }}"
                            class="btn btn-outline-light rounded-pill px-4 py-2">

                            Voltar ao Painel

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection