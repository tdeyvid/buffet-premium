@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        {{-- CABEÇALHO --}}
        <div class="glass rounded-5 p-4 shadow mb-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold text-white mb-1">

                        <i class="fas fa-calendar-alt text-warning me-2"></i>

                        Página de Eventos

                    </h2>

                    <p class="text-secondary mb-0">

                        Gerencie todo conteúdo da página pública de eventos.

                    </p>

                </div>


            </div>

        </div>

        

        <form method="POST" action="{{ route('admin.pagina-eventos.update') }}" enctype="multipart/form-data">
            @csrf

            {{-- CABEÇALHO --}}

            <div class="glass rounded-5 p-4 mb-4 shadow">

                <h4 class="text-warning mb-4">

                    <i class="fas fa-heading me-2"></i>

                    Cabeçalho

                </h4>

                <div class="row g-4">


                    <div class="col-md-6">

                        <label class="text-white">

                            Título

                        </label>


                        <input type="text" name="titulo" class="form-control"
                            value="{{ old('titulo', $pagina->titulo) }}">


                    </div>

                    <div class="col-md-12">

                        <label class="text-white">

                            Subtítulo

                        </label>


                        <textarea name="subtitulo" class="form-control" rows="3">{{ old('subtitulo', $pagina->subtitulo) }}</textarea>

                    </div>

                </div>

            </div>

            {{-- TIPOS EVENTOS --}}

            <div class="glass rounded-5 p-4 mb-4 shadow">

                <h4 class="text-warning mb-4">

                    <i class="fas fa-star me-2"></i>

                    Tipos de Eventos

                </h4>

                <div class="row g-4">


                    @foreach (['casamento', 'aniversario', 'formatura', 'corporativo'] as $tipo)
                        <div class="col-md-6">

                            <label class="text-white">

                                Título {{ ucfirst($tipo) }}

                            </label>


                            <input type="text" name="{{ $tipo }}_titulo" class="form-control"
                                value="{{ old($tipo . '_titulo', $pagina->{$tipo . '_titulo'}) }}">

                        </div>

                        <div class="col-md-6">

                            <label class="text-white">

                                Texto {{ ucfirst($tipo) }}

                            </label>

                            <textarea name="{{ $tipo }}_texto" class="form-control" rows="3">{{ old($tipo . '_texto', $pagina->{$tipo . '_texto'}) }}</textarea>

                        </div>
                    @endforeach


                </div>

            </div>

            {{-- GALERIA --}}

            <div class="glass rounded-5 p-4 mb-4 shadow">

                <h4 class="text-warning mb-4">

                    <i class="fas fa-images me-2"></i>

                    Galeria

                </h4>

                <div class="row g-4">
                    <div class="col-md-6">

                        <label class="text-white">

                            Título

                        </label>


                        <input name="galeria_titulo" class="form-control"
                            value="{{ old('galeria_titulo', $pagina->galeria_titulo) }}">

                    </div>

                    <div class="col-md-6">

                        <label class="text-white">

                            Descrição

                        </label>

                        <input name="galeria_descricao" class="form-control"
                            value="{{ old('galeria_descricao', $pagina->galeria_descricao) }}">

                    </div>

                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-md-3">

                            <label class="text-white">

                                Foto {{ $i }}

                            </label>

                            <input type="file" name="foto{{ $i }}" class="form-control">

                            @if ($pagina->{'foto' . $i})
                                <div class="mt-3">

                                    <img src="{{ $pagina->{'foto' . $i} }}" class="rounded-4 shadow"
                                        style="width:100%;height:160px;object-fit:cover;">

                                </div>
                            @endif

                        </div>
                    @endfor

                </div>

            </div>

            {{-- DIFERENCIAIS --}}

            <div class="glass rounded-5 p-4 mb-4 shadow">

                <h4 class="text-warning mb-4">

                    <i class="fas fa-check me-2"></i>

                    Diferenciais

                </h4>

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="text-white">

                            Título

                        </label>

                        <input name="diferenciais_titulo" class="form-control"
                            value="{{ old('diferenciais_titulo', $pagina->diferenciais_titulo) }}">

                    </div>

                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-md-6">

                            <label class="text-white">

                                Diferencial {{ $i }}

                            </label>

                            <input name="diferencial_{{ $i }}" class="form-control"
                                value="{{ old('diferencial_' . $i, $pagina->{'diferencial_' . $i}) }}">

                        </div>
                    @endfor

                </div>

            </div>

            {{-- CTA --}}

            <div class="glass rounded-5 p-4 mb-4 shadow">

                <h4 class="text-warning mb-4">

                    <i class="fas fa-bullhorn me-2"></i>

                    Chamada Final

                </h4>
                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="text-white">

                            Título

                        </label>

                        <input name="cta_titulo" class="form-control" value="{{ old('cta_titulo', $pagina->cta_titulo) }}">

                    </div>
                    <div class="col-md-6">

                        <label class="text-white">

                            Botão

                        </label>


                        <input name="cta_botao" class="form-control" value="{{ old('cta_botao', $pagina->cta_botao) }}">

                    </div>

                    <div class="col-md-12">

                        <label class="text-white">

                            Texto

                        </label>

                        <textarea name="cta_texto" class="form-control" rows="3">{{ old('cta_texto', $pagina->cta_texto) }}</textarea>

                    </div>



                </div>


            </div>


            <div class="text-end mb-5">


                <button class="btn btn-warning rounded-pill px-5 fw-bold shadow">


                    <i class="fas fa-save me-2"></i>

                    Salvar Alterações


                </button>


            </div>





        </form>


    </div>


@endsection
