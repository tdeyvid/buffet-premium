@extends('layouts.admin')

@section('content')
    <h2 class="fw-bold mb-4">

        <i class="fas fa-edit text-warning me-2"></i>

        Editar Categoria

    </h2>

    <div class="card bg-dark border-secondary">

        <div class="card-body">

            <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label">

                        Nome da categoria

                    </label>

                    <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>

                </div>

                <button class="btn btn-warning rounded-pill">

                    Atualizar

                </button>

                <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary rounded-pill">

                    Cancelar

                </a>

            </form>

        </div>
    </div>
@endsection
