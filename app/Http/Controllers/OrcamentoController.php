<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Evento;

class OrcamentoController extends Controller
{
    public function gerar(Evento $evento)
    {
        $pdf = Pdf::loadView(
            'pdf.orcamento',
            compact('evento')
        );

        return $pdf->download(
            'orcamento.pdf'
        );
    }
}