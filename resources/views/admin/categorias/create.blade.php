@extends('layouts.admin')

@section('content')
    <h2 class="fw-bold mb-4">

        <i class="fas fa-plus-circle text-warning me-2"></i>
        Nova Categoria

    </h2>

    <div class="card bg-dark border-secondary">

        <div class="card-body">

            <form action="{{ route('admin.categorias.store') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">

                        Nome da categoria

                    </label>

                    <input type="text" name="nome" class="form-control" required>

                </div>

                <button class="btn btn-warning rounded-pill">

                    Salvar Categoria

                </button>

                <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary rounded-pill">

                    Cancelar

                </a>

            </form>

        </div>
    </div>
@endsection
