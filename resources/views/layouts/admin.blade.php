<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>

        Sítio Vitória Buffet & Decorações - Admin

    </title>

    {{-- SWEETALERT2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="admin-layout">

    {{-- NAVBAR --}}
    @include('admin.partials.navigation')



    <div class="container-fluid">

        <div class="row">

            {{-- SIDEBAR --}}
            <aside class="col-lg-2 admin-sidebar p-4">

                <h5 class="fw-bold text-warning mb-4">
                    Painel Administrativo
                </h5>


                <ul class="nav flex-column">

                    {{-- DASHBOARD --}}
                    <li class="nav-item mb-2">

                        <a href="{{ route('admin.dashboard') }}" class="nav-link">

                            <i class="fas fa-chart-line me-2"></i> Dashboard

                        </a>
                    </li>

                    {{-- CARDÁPIO --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.cardapios.index') }}">
                            <i class="fas fa-utensils me-2"></i> Cardápio
            
                        </a>
                    </li>

                    {{-- CATEGORIAS --}}
                    <li class="nav-item mb-2">

                        <a href="{{ route('admin.categorias.index') }}" class="nav-link">

                            <i class="fas fa-tags me-2"></i> Categorias

                        </a>
                    </li>

                    {{-- EVENTOS --}}
                    <li class="nav-item mb-2">

                        <a href="{{ route('admin.eventos.index') }}" class="nav-link">

                            <i class="fas fa-calendar-alt me-2"></i>Eventos

                        </a>
                    </li>

                    {{-- GALERIA --}}
                    <li class="nav-item mb-2">

                        <a href="{{ route('admin.galerias.index') }}" class="nav-link">
                            <i class="fas fa-images me-2"></i>Galeria
                        </a>
                    </li>

                    {{-- RESERVAS --}}
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.reservas.index') }}" class="nav-link">
                            <i class="fas fa-book me-2"></i>Reservas
                        </a>

                    </li>

                    {{-- FINANCEIRO --}}
                    <li class="nav-item mb-2">

                        <a href="{{ route('admin.financeiro.index') }}" class="nav-link">

                            <i class="fas fa-dollar-sign me-2"></i>

                            Financeiro
                        </a>
                    </li>

                    {{-- PÁGINA EVENTOS --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pagina-eventos.index') }}">
                            <i class="fas fa-file-alt me-2"></i>

                             Blade Eventos
                        </a>
                    </li>

                </ul>

            </aside>



            {{-- CONTEÚDO --}}
            <main class="col-lg-10 p-4">

                @yield('content')

            </main>

        </div>

    </div>



    {{-- ALERTA SUCESSO --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Sucesso!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1800
            });
        </script>
    @endif



    {{-- ALERTA ERRO --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Erro!",
                text: "{{ session('error') }}",
                confirmButtonColor: "#d33"
            });
        </script>
    @endif



    {{-- ALERTA VALIDAÇÃO --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: "warning",
                title: "Atenção!",
                html: ` @foreach ($errors->all() as $erro)

                    <div>

                        • {{ $erro }}

                    </div>

                @endforeach `,
                confirmButtonColor: "#3085d6"

            });
        </script>
    @endif



    {{-- FUNÇÃO GLOBAL EXCLUIR --}}
    <script>
        function confirmarExclusao(event, form) {

            event.preventDefault();

            Swal.fire({

                title: "Tem certeza?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar"

            }).then((result) => {

                if (result.isConfirmed) {

                    Swal.fire({
                        title: "Excluído!",
                        text: "O registro foi removido com sucesso.",
                        icon: "success",
                        timer: 1200,
                        showConfirmButton: false

                    });

                    setTimeout(() => {
                        form.submit();
                    }, 1200);

                }

            });

        }
    </script>

</body>

</html>
