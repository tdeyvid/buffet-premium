<nav x-data="{ open: false }" class="bg-black/80 backdrop-blur-lg fixed top-0 w-full z-50 shadow-none border-none">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-20">

            {{-- LOGO --}}
            <div class="flex items-center gap-10">

                <a href="{{ url('/') }}" class="flex items-center gap-3 no-underline">

                    {{-- Ícone --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500 shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />

                    </svg>

                    {{-- Texto --}}
                    <div class="flex flex-col leading-tight">
                        <span class="text-white text-2xl lg:text-3xl font-extrabold tracking-wide">
                            Sítio Vitória
                        </span>
                        <span class="text-yellow-500 text-xs uppercase tracking-[0.3em]">
                            Buffet & Decorações
                        </span>
                    </div>
                </a>
                {{-- MENU DESKTOP --}}
                <div class="hidden md:flex items-center gap-8">

                    <a href="{{ url('/') }}"
                        class="text-white hover:text-yellow-500 transition duration-300 no-underline">

                        Início

                    </a>

                    <a href="{{ route('cardapios.index') }}"
                        class="text-white hover:text-yellow-500 transition duration-300 no-underline">

                        Cardápio

                    </a>

                    <a href="{{ route('eventos.index') }}"
                        class="text-white hover:text-yellow-500 transition duration-300 no-underline">

                        Eventos

                    </a>

                    <a href="{{ route('galeria') }}"
                        class="text-white hover:text-yellow-500 transition duration-300 no-underline">

                        Galeria

                    </a>

                    <a href="{{ route('reservas.create') }}"
                        class="text-white hover:text-yellow-500 transition duration-300 no-underline">

                        Reservas

                    </a>

                    <a href="{{ route('sobre') }}"
                        class="text-white hover:text-yellow-500 transition duration-300 no-underline">

                        Sobre

                    </a>

                    {{-- DASHBOARD APENAS ADMIN --}}
                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-white hover:text-yellow-500 transition duration-300 no-underline">

                                Dashboard

                            </a>
                        @endif
                    @endauth

                </div>

            </div>


            {{-- ÁREA USUÁRIO --}}
            <div class="hidden md:flex items-center">

                @auth

                    <div x-data="{ userMenu: false }" class="relative">

                        <button @click="userMenu=!userMenu"
                            class="flex items-center gap-2 text-white hover:text-yellow-500 bg-transparent border-0">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                            </svg>

                            {{ Auth::user()->name }}

                        </button>

                        {{-- MENU USUÁRIO --}}
                        <div x-show="userMenu" @click.away="userMenu=false" x-transition
                            class="absolute right-0 mt-3 w-56 rounded-xl bg-zinc-900 shadow-xl overflow-hidden">

                            @if (auth()->user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-3 text-white hover:bg-zinc-800 no-underline">

                                    Dashboard

                                </a>
                            @endif

                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-3 text-white hover:bg-zinc-800 no-underline">

                                Meu Perfil

                            </a>
                            <a href="{{ route('reservas.minhas') }}"
                                class="block px-4 py-3 text-white hover:bg-zinc-800 no-underline">

                                Minhas Reservas

                            </a>

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button type="submit" class="w-full text-left px-4 py-3 text-red-400 hover:bg-zinc-800">

                                    Sair

                                </button>

                            </form>

                        </div>

                    </div>
                @else
                    <div class="flex gap-3">
                        <a href="{{ route('login') }}" class="text-white no-underline d-flex align-items-center">

                            Entrar

                        </a>

                        <a href="{{ route('register') }}"
                            class="bg-yellow-500 px-5 py-2 rounded-full font-bold text-black no-underline">

                            Criar Conta

                        </a>

                    </div>

                @endauth

            </div>

            {{-- BOTÃO MOBILE --}}
            <div class="md:hidden">

                <button @click="open=!open" class="text-white">

                    ☰

                </button>

            </div>

        </div>

    </div>


    {{-- MENU MOBILE --}}
    <div x-show="open" x-transition class="md:hidden bg-black/95">

        <div class="px-6 py-6 space-y-5">

            <a href="{{ url('/') }}" class="block text-white no-underline">

                Início

            </a>

            <a href="{{ route('cardapios.index') }}" class="block text-white no-underline">

                Cardápio

            </a>

            <a href="{{ route('eventos.index') }}" class="block text-white no-underline">

                Eventos

            </a>

            <a href="{{ route('galeria') }}" class="block text-white no-underline">

                Galeria

            </a>

            <a href="{{ route('reservas.create') }}" class="block text-white no-underline">

                Reservas

            </a>

            @auth

                @if (auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="block text-white">

                        Dashboard

                    </a>
                @endif

                <div>

                    <h5 class="text-white">

                        {{ Auth::user()->name }}

                    </h5>

                    <small class="text-gray-400">

                        {{ Auth::user()->email }}

                    </small>

                </div>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="text-red-400">

                        Sair

                    </button>

                </form>
            @else
                <a href="{{ route('login') }}" class="block text-white">

                    Entrar

                </a>

                <a href="{{ route('register') }}" class="block text-yellow-500 font-bold">

                    Cadastro

                </a>

            @endauth

        </div>

    </div>

</nav>
