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

                <div class="glass rounded-5 p-5 shadow-lg border border-light border-opacity-10 text-center">

                    {{-- LOGO --}}
                    <div class="mb-4">

                        <h1 class="fw-bold text-white display-6 mb-0">

                            Sítio Vitória

                        </h1>

                        <span
                            class="text-warning text-uppercase fw-semibold"
                            style="letter-spacing:4px;font-size:.85rem;">

                            Buffet • Decorações

                        </span>

                        <p class="text-light mt-3">

                            Verificação de Email

                        </p>

                    </div>


                    {{-- ÍCONE --}}
                    <div class="mb-4">

                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded-circle bg-warning text-dark shadow"
                            style="width:90px;height:90px;font-size:38px;">

                            ✉️

                        </div>

                    </div>


                    {{-- TEXTO --}}
                    <div class="mb-4 text-light">

                        Obrigado por se cadastrar!

                        <br><br>

                        Antes de continuar, confirme seu endereço
                        de email clicando no link enviado para sua
                        caixa de entrada.

                        <br><br>

                        Caso não tenha recebido o email,
                        utilize o botão abaixo para reenviar.

                    </div>


                    {{-- STATUS --}}
                    @if (session('status') == 'verification-link-sent')

                        <div class="alert alert-success rounded-4 mb-4">

                            Um novo link de verificação foi enviado
                            para seu email.

                        </div>

                    @endif


                    {{-- REENVIAR --}}
                    <form method="POST"
                        action="{{ route('verification.send') }}"
                        class="mb-3">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-warning rounded-pill fw-bold px-5 py-3 shadow">

                            Reenviar Email

                        </button>

                    </form>


                    {{-- SAIR --}}
                    <form method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-outline-light rounded-pill px-4 py-2">

                            Sair

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection