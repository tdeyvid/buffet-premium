<nav class="navbar navbar-expand-lg navbar-dark admin-navbar shadow py-3">

    <div class="container-fluid">

        {{-- LOGO --}}
        <a class="navbar-brand d-flex align-items-center gap-3"
           href="{{ route('home') }}">

            <div class="d-flex flex-column">

                <span class="fw-bold text-white fs-4">

                    Sítio Vitória

                </span>

                <small
                    class="text-warning text-uppercase fw-semibold"
                    style="letter-spacing:3px;">

                    Buffet • Decorações

                </small>

            </div>

        </a>


        {{-- LADO DIREITO --}}
        <div class="d-flex align-items-center gap-4">

            {{-- USUÁRIO --}}
            <div class="d-flex align-items-center">

                <div
                    class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center me-2"
                    style="width:42px;height:42px;">

                    <i class="fas fa-user"></i>

                </div>

                <div class="d-flex flex-column">

                    <small class="text-secondary">

                        Bem-vindo

                    </small>

                    <span class="text-light fw-semibold">

                        {{ Auth::user()->name }}

                    </span>

                </div>

            </div>


            {{-- SAIR --}}
            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="btn btn-warning rounded-pill px-4 fw-semibold">

                    <i class="fas fa-sign-out-alt me-2"></i>

                    Sair

                </button>

            </form>

        </div>

    </div>

</nav>