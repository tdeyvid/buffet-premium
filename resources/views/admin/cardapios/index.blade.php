@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        {{-- CABEÇALHO --}}

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="d-flex align-items-center gap-3">

                <div class="bg-warning text-dark rounded-circle p-3 shadow">

                    <i class="fas fa-utensils fa-2x"></i>

                </div>


                <div>

                    <h2 class="fw-bold text-white mb-0">
                        Cardápio
                    </h2>


                    <span class="text-secondary">
                        Gerencie os pratos do buffet
                    </span>


                </div>


            </div>
            <a href="{{ route('admin.cardapios.create') }}" class="btn btn-warning rounded-pill px-4 shadow">

                <i class="fas fa-plus me-2"></i>

                Novo Prato

            </a>

        </div>

        {{-- ESTATISTICAS --}}

        <div class="row mb-4">

            <div class="col-md-4 mb-3">

                <div class="card bg-dark border-0 shadow stat-card">

                    <div class="card-body d-flex justify-content-between">

                        <div>

                            <h6 class="text-secondary">
                                Total de Pratos
                            </h6>


                            <h2 class="text-warning fw-bold">

                                {{ $totalCardapios }}

                            </h2>

                        </div>

                        <i class="fas fa-bowl-food fa-3x text-warning opacity-50"></i>

                    </div>

                </div>

            </div>


            <div class="col-md-4 mb-3">

                <div class="card bg-dark border-0 shadow stat-card">

                    <div class="card-body d-flex justify-content-between">

                        <div>

                            <h6 class="text-secondary">
                                Categorias
                            </h6>


                            <h2 class="text-info fw-bold">

                                {{ $totalCategorias }}

                            </h2>

                        </div>

                        <i class="fas fa-layer-group fa-3x text-info opacity-50"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="card bg-dark border-0 shadow stat-card">

                    <div class="card-body d-flex justify-content-between">

                        <div>

                            <h6 class="text-secondary">
                                Preço Médio
                            </h6>


                            <h2 class="text-success fw-bold">

                                R$ {{ number_format($precoMedio, 2, ',', '.') }}

                            </h2>

                        </div>

                        <i class="fas fa-dollar-sign fa-3x text-success opacity-50"></i>


                    </div>

                </div>

            </div>

        </div>

        {{-- FILTRO --}}

        <div class="card bg-dark border-0 shadow mb-4">

            <div class="card-body">

                <form method="GET">

                    <div class="row g-3">

                        <div class="col-md-5">

                            <input type="text" name="busca" class="form-control" placeholder="Buscar prato..."
                                value="{{ request('busca') }}">


                        </div>

                        <div class="col-md-4">

                            <select name="categoria" class="form-select">


                                <option value="">
                                    Todas Categorias
                                </option>



                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" @selected(request('categoria') == $categoria->id)>


                                        {{ $categoria->nome }}


                                    </option>
                                @endforeach

                            </select>

                        </div>


                        <div class="col-md-3">

                            <button class="btn btn-warning w-100 rounded-pill">

                                <i class="fas fa-search me-2"></i>

                                Filtrar

                            </button>


                        </div>

                    </div>

                </form>
            </div>


        </div>

        {{-- CARDAPIO --}}

        <div class="row">

            @forelse($cardapios as $cardapio)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

                    <div class="card bg-dark border-0 shadow h-100 card-hover">

                        <div class="position-relative">

                            @if ($cardapio->imagem)
                                <img src="{{ asset('storage/' . $cardapio->imagem) }}" class="w-100 rounded-4"
                                    style="height:250px;object-fit:cover" alt="{{ $cardapio->nome }}">
                            @else
                                <img src="{{ asset('images/sem-imagem.jpg') }}" class="w-100 rounded-4"
                                    style="height:250px;object-fit:cover" alt="Sem imagem">
                            @endif

                            <span class="position-absolute top-0 end m-3 badge bg-warning text-dark">

                                {{ $cardapio->categoria->nome ?? 'Sem categoria' }}

                            </span>

                        </div>

                        <div class="card-body">

                            <h5 class="text-white">

                                {{ $cardapio->nome }}
                            </h5>

                            <p class="text-secondary">

                                {{ Str::limit($cardapio->descricao, 90) }}

                            </p>

                            <h4 class="text-success">

                                R$ {{ number_format($cardapio->preco, 2, ',', '.') }}

                            </h4>

                        </div>

                        <div class="card-footer bg-transparent border-0 d-flex gap-2">

                            <a href="{{ route('admin.cardapios.edit', $cardapio->id) }}"
                                class="btn btn-outline-info btn-sm rounded-pill flex-fill">
                                <i class="fas fa-edit"></i> Editar

                            </a>
                            <form action="{{ route('admin.cardapios.destroy', $cardapio->id) }}" method="POST"
                                class="flex-fill">

                                @csrf
                                @method('DELETE')

                                <button onclick="confirmarExclusao(event, this.form)"
                                    class="btn btn-outline-danger btn-sm rounded-pill w-100">
                                    <i class="fas fa-trash"></i>
                                    Excluir
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning">

                        Nenhum prato cadastrado.

                    </div>

                </div>
            @endforelse

        </div>

        <div class="mt-4">

            {{ $cardapios->links() }}

        </div>

    </div>
@endsection
