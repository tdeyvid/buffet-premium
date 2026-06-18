@extends('layouts.admin')

@section('content')
    <div class="glass rounded-5 p-5">

        <h1 class="fw-bold mb-4">
            Upload Galeria
        </h1>

        <form action="{{ route('admin.galerias.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label>Título</label>

                <input type="text" name="titulo" class="form-control">

            </div>

            <div class="mb-4">

                <label>Imagens</label>

                <input type="file" name="imagem[]" multiple class="form-control">

            </div>

            <div id="preview" class="row g-3 mb-4"></div>

            <button class="btn btn-warning rounded-pill px-5">

                Enviar Imagens

            </button>

        </form>

    </div>
@endsection
