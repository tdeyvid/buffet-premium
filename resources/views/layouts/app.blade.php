<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sítio Vitória Buffet & Decorações</title>

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- BOOTSTRAP ICONS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-black text-white">

    {{-- NAVBAR --}}
    @include('layouts.navigation')

    {{-- CONTENT --}}
    <main>

        @yield('content')

    </main>

    {{-- FOOTER --}}
    <footer class="bg-black border-top border-dark py-5 mt-5">

        <div class="container">

            <div class="row g-4">

                {{-- LOGO / DESCRIÇÃO --}}
                <div class="col-lg-4">

                    <div class="text-center">

                        <h2 class="fw-bold text-white display-5 mb-0">

                            Sítio Vitória

                        </h2>

                        <span class="text-warning text-uppercase fw-semibold" style="letter-spacing:4px;">

                            Buffet & Decorações

                        </span>

                    </div>
                    <p class="text-secondary mt-3">

                        Eventos sofisticados e experiências inesquecíveis.

                    </p>

                </div>

                {{-- LINKS --}}
                <div class="col-lg-4">

                    <h5 class="fw-bold mb-4">

                        Links

                    </h5>

                    <div class="row">

                        {{-- COLUNA 1 --}}
                        <div class="col-6">

                            <ul class="list-unstyled">

                                <li class="mb-3">

                                    <a href="/" class="text-secondary text-decoration-none">

                                        <i class="bi bi-house-fill me-2 text-warning"></i>
                                        Início

                                    </a>

                                </li>

                                <li class="mb-3">

                                    <a href="/sobre" class="text-secondary text-decoration-none">

                                        <i class="bi bi-info-circle-fill me-2 text-warning"></i>
                                        Sobre

                                    </a>

                                </li>

                                <li class="mb-3">

                                    <a href="/eventos" class="text-secondary text-decoration-none">

                                        <i class="bi bi-calendar-event-fill me-2 text-warning"></i>
                                        Eventos

                                    </a>

                                </li>

                            </ul>

                        </div>

                        {{-- COLUNA 2 --}}
                        <div class="col-6">

                            <ul class="list-unstyled">

                                <li class="mb-3">

                                    <a href="/cardapio" class="text-secondary text-decoration-none">

                                        <i class="bi bi-menu-button-fill me-2 text-warning"></i>
                                        Cardápio

                                    </a>

                                </li>

                                <li class="mb-3">

                                    <a href="/galeria" class="text-secondary text-decoration-none">

                                        <i class="bi bi-images me-2 text-warning"></i>
                                        Galeria

                                    </a>

                                </li>

                                <li class="mb-3">

                                    <a href="/reservas" class="text-secondary text-decoration-none">

                                        <i class="bi bi-calendar-check-fill me-2 text-warning"></i>
                                        Reservas

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

                {{-- CONTATO --}}
                <div class="col-lg-4">

                    <h5 class="fw-bold mb-4">

                        Contato

                    </h5>

                    {{-- WHATSAPP --}}
                    <p>

                        <a href="https://wa.me/5585988840757?text=Olá!%20Gostaria%20de%20mais%20informações%20sobre%20os%20eventos%20no%20Buffet%20Sítio%20Vitória.."
                            target="_blank" class="text-secondary text-decoration-none">

                            <i class="bi bi-whatsapp text-success me-2"></i>

                            (85) 98884-0757

                        </a>

                    </p>

                    {{-- EMAIL --}}
                    <p class="text-secondary">

                        <i class="bi bi-envelope-fill text-warning me-2"></i>

                        contato@buffet.com

                    </p>

                    {{-- ENDEREÇO --}}
                    <p>

                        <a href="https://maps.google.com/?q=Sítio Vitória Redenção CE" target="_blank"
                            class="text-secondary text-decoration-none">

                            <i class="bi bi-geo-alt-fill text-danger me-2"></i>

                            Sítio Vitória, Redenção - CE

                        </a>

                    </p>

                    {{-- INSTAGRAM --}}
                    <p>

                        <a href="https://instagram.com/buffetsitiovitoria" target="_blank"
                            class="text-secondary text-decoration-none">

                            <i class="bi bi-instagram text-danger me-2"></i>

                            @sitiovitoriabuffetdecor

                        </a>

                    </p>

                </div>

            </div>

            {{-- LINHA DIVISÓRIA --}}
            <hr class="border-secondary my-4">

            {{-- COPYRIGHT --}}
            <div class="text-center text-secondary">

                © {{ date('Y') }} Sítio Vitória Buffet & Decorações -
                Todos os direitos reservados.

            </div>

        </div>

    </footer>

    {{-- BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    {{-- BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- SWEETALERT2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- ALERTA SUCESSO --}}
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({
                    icon: "success",
                    title: "Sucesso!",
                    text: @json(session('success')),
                    confirmButtonText: "OK",
                    confirmButtonColor: "#198754",
                    timer: 1800,
                    showConfirmButton: false
                });

            });
        </script>
    @endif

    {{-- ALERTA ERRO --}}
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({
                    icon: "error",
                    title: "Erro!",
                    text: @json(session('error')),
                    confirmButtonText: "Fechar",
                    confirmButtonColor: "#d33"
                });

            });
        </script>
    @endif

    {{-- ALERTA WARNING --}}
    @if (session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({
                    icon: "warning",
                    title: "Atenção!",
                    text: @json(session('warning')),
                    confirmButtonText: "Entendi",
                    confirmButtonColor: "#ffc107"
                });

            });
        </script>
    @endif

    {{-- ALERTA VALIDAÇÃO --}}
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Swal.fire({
                    icon: "warning",
                    title: "Campos inválidos!",
                    html: `
                    <div style="text-align:left;">
                        @foreach ($errors->all() as $erro)
                            <p class="mb-2">• {{ $erro }}</p>
                        @endforeach
                    </div>
                `,
                    confirmButtonText: "Corrigir",
                    confirmButtonColor: "#ffc107"
                });

            });
        </script>
    @endif


    <script>
        function confirmarExclusaoConta(form) {

            Swal.fire({

                title: 'Tem certeza?',
                text: 'Sua conta será excluída permanentemente!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sim, excluir',
                cancelButtonText: 'Cancelar'

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });

        }
    </script>

    <script>
        function confirmarExclusaoReserva(event, form) {

            event.preventDefault();

            Swal.fire({

                title: 'Excluir reserva?',
                text: 'Esta reserva será removida permanentemente.',
                icon: 'warning',
                showCancelButton: true,

                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',

                confirmButtonText: 'Sim, excluir',
                cancelButtonText: 'Cancelar',

                reverseButtons: true

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });

            return false;
        }
    </script>


</body>

</html>
