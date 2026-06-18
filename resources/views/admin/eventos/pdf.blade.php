<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #333;
            padding: 15px;
            background: #fff;
            font-size: 14px;
        }

        /* CABEÇALHO */

        .header {
            background: #111;
            color: #fff;
            padding: 25px;
            margin-bottom: 25px;
        }

        .logo-title {
            font-size: 28px;
            font-weight: bold;
        }

        .logo-subtitle {
            color: #ffc107;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 5px;
        }

        .document-title {
            margin-top: 15px;
            font-size: 18px;
        }

        /* CARDS */

        .card {
            border: 1px solid #ddd;
            margin-bottom: 5px;
        }

        .card-header {
            background: #ffc107;
            color: #000;
            font-weight: bold;
            padding: 12px 20px;
        }

        .card-body {
            padding: 20px;
        }

        /* TABELA */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .label {
            width: 180px;
            font-weight: bold;
            color: #555;
        }

        /* DESCRIÇÃO */

        .descricao {
            line-height: 1.8;
            white-space: normal;
        }

        /* VALOR */

        .valor-box {
            background: #111;
            color: white;
            padding: 15px;
            text-align: center;
            margin-top: 10px;
        }

        .valor-box span {
            color: #ffc107;
            font-size: 24px;
            font-weight: bold;
        }

        /* STATUS */

        .status {
            font-weight: bold;
        }

        /* RODAPÉ */

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
    </style>
</head>

<body>

    <!-- CABEÇALHO -->
    <div class="header">

        <div class="logo-title">
            Sítio Vitória
        </div>

        <div class="logo-subtitle">
            Buffet • Decorações
        </div>

        <div class="document-title">
            Orçamento / Dados do Evento
        </div>

    </div>

    <!-- INFORMAÇÕES DO EVENTO -->
    <div class="card">

        <div class="card-header">
            Informações do Evento
        </div>

        <div class="card-body">

            <table>

                <tr>
                    <td class="label">Cliente</td>
                    <td>{{ $evento->cliente }}</td>
                </tr>

                <tr>
                    <td class="label">Telefone</td>
                    <td>{{ $evento->telefone ?: '-' }}</td>
                </tr>

                <tr>
                    <td class="label">Tipo de Evento</td>
                    <td>{{ $evento->tipo_evento }}</td>
                </tr>

                <tr>
                    <td class="label">Data do Evento</td>
                    <td>
                        {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}
                    </td>
                </tr>

                <tr>
                    <td class="label">Convidados</td>
                    <td>{{ $evento->convidados }}</td>
                </tr>

                <tr>
                    <td class="label">Status</td>
                    <td class="status">
                        {{ ucfirst($evento->status) }}
                    </td>
                </tr>

            </table>

        </div>

    </div>

    <!-- DESCRIÇÃO -->
    <div class="card">

        <div class="card-header">
            Descrição do Evento
        </div>

        <div class="card-body">

            <div class="descricao">
                {!! nl2br(e($evento->descricao ?? 'Nenhuma descrição informada.')) !!}
            </div>

        </div>

    </div>

    <!-- OBSERVAÇÕES -->
    @if(!empty($evento->observacoes))
        <div class="card">

            <div class="card-header">
                Observações
            </div>

            <div class="card-body">

                <div class="descricao">
                    {!! nl2br(e($evento->observacoes)) !!}
                </div>

            </div>

        </div>
    @endif

    <!-- VALOR -->
    <div class="valor-box">

        Valor Total do Evento

        <br><br>

        <span>
            R$ {{ number_format($evento->valor, 2, ',', '.') }}
        </span>

    </div>

    <!-- RODAPÉ -->
    <div class="footer">

        <strong>Sítio Vitória - Buffet & Decorações</strong>

        <br>

        Redenção - CE | WhatsApp: (85) 98884-0757

        <br><br>

        Documento gerado em: {{ now()->format('d/m/Y H:i') }}

    </div>

</body>

</html>