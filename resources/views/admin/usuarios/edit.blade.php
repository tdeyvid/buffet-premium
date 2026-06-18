@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="card bg-dark text-white">

            <div class="card-body">

                <form method="POST" action="{{ route('admin.usuarios.update', $usuario) }}">

                    @csrf
                    @method('PUT')

                    <input type="text" name="name" value="{{ $usuario->name }}" class="form-control mb-3">

                    <input type="email" name="email" value="{{ $usuario->email }}" class="form-control mb-3">

                    <select name="role" class="form-select mb-3">

                        <option value="cliente" {{ $usuario->role == 'cliente' ? 'selected' : '' }}>
                            Cliente
                        </option>

                        <option value="funcionario" {{ $usuario->role == 'funcionario' ? 'selected' : '' }}>
                            Funcionário
                        </option>

                        <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>
                            Administrador
                        </option>

                    </select>

                    <button class="btn btn-warning">

                        Atualizar

                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
