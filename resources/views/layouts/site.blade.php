<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sítio Vitória Buffet & Decorações</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@yield('content')

{{-- SWEETALERT2 --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: "{{ session('success') }}",
            background: '#111',
            color: '#fff',
            confirmButtonColor: '#d4af37',
            timer: 2200,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: "{{ session('error') }}",
            background: '#111',
            color: '#fff',
            confirmButtonColor: '#dc3545'
        });
    </script>
@endif

@if (session('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Atenção!',
            text: "{{ session('warning') }}",
            background: '#111',
            color: '#fff',
            confirmButtonColor: '#ffc107'
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Campos inválidos!',
            html: `
                <div style="text-align:left">
                    @foreach ($errors->all() as $erro)
                        <p>• {{ $erro }}</p>
                    @endforeach
                </div>
            `,
            background: '#111',
            color: '#fff',
            confirmButtonColor: '#d4af37'
        });
    </script>
@endif

</body>
</html>