@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="card bg-dark text-white">

            <div class="card-body">

                <form method="POST" action="{{ route('admin.usuarios.store') }}">

                    @csrf

                    <input type="text" name="name" placeholder="Nome" class="form-control mb-3">

                    <input type="email" name="email" placeholder="Email" class="form-control mb-3">

                    <input type="password" name="password" placeholder="Senha" class="form-control mb-3">

                    <select name="role" class="form-select mb-3">

                        <option value="cliente">

                            Cliente

                        </option>

                        <option value="funcionario">

                            Funcionário

                        </option>

                        <option value="admin">

                            Administrador

                        </option>

                    </select>

                    <button class="btn btn-warning">

                        Salvar

                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
