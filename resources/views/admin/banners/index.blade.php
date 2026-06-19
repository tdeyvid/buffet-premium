@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-5">

        <h1 class="fw-bold">
            Banners
        </h1>

        <button class="btn btn-warning rounded-pill px-4">
            Novo Banner
        </button>

    </div>

    <div class="row g-4">

        @for ($i = 0; $i < 4; $i++)
            <div class="col-md-6">

                <div class="glass rounded-5 overflow-hidden">

                    <img src="{{ asset('storage/buffet.jpg') }}" class="img-fluid">

                    <div class="p-4">

                        <h4>
                            Banner Principal
                        </h4>

                    </div>

                </div>

            </div>
        @endfor

    </div>
@endsection
