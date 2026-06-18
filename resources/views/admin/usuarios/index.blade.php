@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="d-flex justify-content-between mb-4">

            <h2>
                Usuários
            </h2>

            <a href="{{ route('admin.usuarios.create') }}" class="btn btn-warning">

                Novo usuário

            </a>

        </div>

        <div class="card bg-dark text-white">

            <div class="card-body">

                <table class="table table-dark">

                    <thead>

                        <tr>

                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Ações</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($usuarios as $usuario)
                            <tr>

                                <td>
                                    {{ $usuario->name }}
                                </td>

                                <td>
                                    {{ $usuario->email }}
                                </td>

                                <td>
                                    {{ ucfirst($usuario->role) }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.usuarios.edit', $usuario) }}" class="btn btn-primary">

                                        Editar

                                    </a>

                                    <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">

                                            Excluir

                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                {{ $usuarios->links() }}

            </div>

        </div>

    </div>
@endsection
