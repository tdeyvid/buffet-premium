<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Evento;
use App\Models\Cardapio;

class FinanceiroController extends Controller
{
    public function index()
    {
        // Totais
        $totalReservas = Reserva::count();
        $totalEventos = Evento::count();
        $totalCardapio = Cardapio::count();

        // Reservas pendentes
        $reservasPendentes = Reserva::where(
            'status',
            'pendente'
        )->count();

        // Eventos por status
        $confirmados = Evento::where(
            'status',
            'confirmado'
        )->count();

        $cancelados = Evento::where(
            'status',
            'cancelado'
        )->count();

        $finalizados = Evento::where(
            'status',
            'finalizado'
        )->count();

        // Faturamento total
        $faturamento = Evento::where(
            'status',
            'finalizado'
        )->sum('valor');

        // Faturamento do mês
        $faturamentoMes = Evento::where(
            'status',
            'finalizado'
        )
        ->whereMonth('data_evento', now()->month)
        ->whereYear('data_evento', now()->year)
        ->sum('valor');

        // Ticket médio
        $ticketMedio = $confirmados > 0
            ? ($faturamento / $confirmados)
            : 0;

        // Últimos eventos
        $ultimosEventos = Evento::latest()
            ->take(5)
            ->get();

        // Últimas reservas
        $ultimasReservas = Reserva::latest()
            ->take(5)
            ->get();

        return view(
            'admin.financeiro.index',
            compact(
                'totalReservas',
                'totalEventos',
                'totalCardapio',
                'reservasPendentes',
                'confirmados',
                'cancelados',
                'finalizados',
                'faturamento',
                'faturamentoMes',
                'ticketMedio',
                'ultimosEventos',
                'ultimasReservas'
            )
        );
    }
}