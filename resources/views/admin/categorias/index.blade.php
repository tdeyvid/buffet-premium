@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- CABEÇALHO --}}
    <div class="glass rounded-5 p-4 shadow mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold text-white mb-1">

                    <i class="fas fa-tags text-warning me-2"></i>

                    Categorias

                </h2>

                <small class="text-secondary">

                    Gerencie todas as categorias cadastradas

                </small>

            </div>

            <a href="{{ route('admin.categorias.create') }}"
               class="btn btn-success rounded-pill px-4">

                <i class="fas fa-plus me-2"></i>

                Nova Categoria

            </a>

        </div>

    </div>

    {{-- CARD RESUMO --}}
    <div class="row mb-4">

        <div class="col-md-4">

            <div class="glass rounded-5 p-4 shadow">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">

                            Total de Categorias

                        </small>

                        <h2 class="text-white fw-bold mb-0">

                            {{ $categorias->total() }}

                        </h2>

                    </div>

                    <i class="fas fa-tags fa-3x text-warning"></i>

                </div>

            </div>

        </div>

    </div>

    {{-- TABELA --}}
    <div class="glass rounded-5 p-4 shadow">

        <div class="table-responsive">

            <table class="table table-dark table-hover align-middle mb-0">

                <thead>

                    <tr>

                        <th width="100">
                            #
                        </th>

                        <th>
                            Nome da Categoria
                        </th>

                        <th width="220" class="text-center">
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($categorias as $categoria)

                    <tr>

                        <td>

                            <span class="badge bg-secondary">

                                #{{ $categoria->id }}

                            </span>

                        </td>

                        <td>

                            <div class="fw-bold text-white">

                                {{ $categoria->nome }}

                            </div>

                        </td>

                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('admin.categorias.edit',$categoria->id) }}"
                                   class="btn btn-primary btn-sm rounded-pill">

                                    <i class="fas fa-edit me-1"></i>

                                    Editar

                                </a>

                                <form action="{{ route('admin.categorias.destroy',$categoria->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm rounded-pill"
                                        onclick="confirmarExclusao(event, this.form)">

                                        <i class="fas fa-trash me-1"></i>

                                        Excluir

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="text-center py-5">

                            <i class="fas fa-folder-open fa-4x text-secondary mb-3"></i>

                            <h5 class="text-secondary">

                                Nenhuma categoria encontrada

                            </h5>

                            <p class="text-muted">

                                Clique em "Nova Categoria" para começar.

                            </p>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINAÇÃO --}}
        <div class="mt-4">

            {{ $categorias->links() }}

        </div>

    </div>

</div>

@endsection