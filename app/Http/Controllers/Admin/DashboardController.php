<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cardapio;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Reserva;
use App\Models\Evento;
use App\Models\Galeria;

class DashboardController extends Controller
{
    public function index()
    {
        // Cards
        $totalCardapio = Cardapio::count();
        $totalCategorias = Categoria::count();
        $totalReservas = Reserva::count();
        $totalEventos = Evento::count();
        $totalGaleria = Galeria::count();


        // Reservas pendentes
        $reservasPendentes = Reserva::where(
            'status',
            'pendente'
        )->count();

        // Financeiro
         $faturamento = Evento::where(
            'status',
            'finalizado'
        )->sum('valor');

        // Últimas reservas
        $ultimasReservas = Reserva::latest()
            ->take(5)
            ->get();

        // Próximos eventos
        $proximosEventos = Evento::orderBy('data_evento')
            ->take(5)
            ->get();

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
        
        $ultimosEventos = Evento::latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalCardapio',
                'totalCategorias',
                'totalReservas',
                'totalEventos',
                'totalGaleria',
                'reservasPendentes',
                'faturamento',
                'ultimasReservas',
                'proximosEventos',
                'confirmados',
                'cancelados',
                'ultimosEventos',
                'finalizados'
            )
        );
    }
}
