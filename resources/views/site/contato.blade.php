@extends('layouts.site')

@section('content')

{{-- HERO --}}
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url('/images/banner.jpg'); background-size: cover; background-position: center;">

    <div class="container py-5">

        <h1 class="fw-bold display-5 mb-3">
            Fale Conosco
        </h1>

        <p class="lead text-light opacity-75">
            Estamos prontos para atender você e transformar seu evento em algo inesquecível.
        </p>

    </div>

</section>

{{-- CONTEÚDO --}}
<section class="py-5 bg-black text-white">

    <div class="container">

        <div class="row g-5">

            {{-- INFORMAÇÕES --}}
            <div class="col-lg-5">

                <div class="p-5 rounded-5 shadow-lg bg-dark border border-secondary">

                    <h3 class="fw-bold mb-4 text-warning">
                        Informações de Contato
                    </h3>

                    <p class="mb-3">
                        <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                        Sítio Vitória, Redenção - CE
                    </p>

                    <p class="mb-3">
                        <a href="https://wa.me/5585988840757"
                           target="_blank"
                           class="text-white text-decoration-none">

                            <i class="bi bi-whatsapp text-success me-2"></i>
                            (85) 98884-0757

                        </a>
                    </p>

                    <p class="mb-3">
                        <i class="bi bi-envelope-fill text-warning me-2"></i>
                        contato@buffet.com
                    </p>

                    <p class="mb-0">
                        <a href="https://instagram.com/buffetsitiovitoria"
                           target="_blank"
                           class="text-white text-decoration-none">

                            <i class="bi bi-instagram text-danger me-2"></i>
                            @buffetsitiovitoria

                        </a>
                    </p>

                </div>

            </div>

            {{-- FORMULÁRIO --}}
            <div class="col-lg-7">

                <div class="p-5 rounded-5 shadow-lg bg-dark border border-secondary">

                    <h3 class="fw-bold mb-4 text-warning">
                        Envie sua mensagem
                    </h3>

                    <form>

                        <div class="mb-4">

                            <input type="text"
                                   class="form-control form-control-lg bg-black text-white border-secondary"
                                   placeholder="Seu nome">

                        </div>

                        <div class="mb-4">

                            <input type="email"
                                   class="form-control form-control-lg bg-black text-white border-secondary"
                                   placeholder="Seu e-mail">

                        </div>

                        <div class="mb-4">

                            <textarea rows="6"
                                      class="form-control bg-black text-white border-secondary"
                                      placeholder="Digite sua mensagem..."></textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-warning btn-lg px-5 rounded-pill fw-bold shadow">

                            Enviar Mensagem

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection