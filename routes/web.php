<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS PÚBLICOS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;

/*
|--------------------------------------------------------------------------
| CONTROLLERS ADMIN
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\FinanceiroController;
use App\Http\Controllers\Admin\EventoController as EventoAdminController;
use App\Http\Controllers\Admin\GaleriaController as GaleriaAdminController;
use App\Http\Controllers\Admin\ReservaController as ReservaAdminController;
use App\Http\Controllers\Admin\CardapioController as AdminCardapioController;

use App\Http\Controllers\Admin\UsuarioController;

use App\Http\Controllers\Admin\PaginaEventoController;

/*
|--------------------------------------------------------------------------
| ROTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/cardapio', [CardapioController::class, 'index'])->name('cardapios.index');



/*
|--------------------------------------------------------------------------
| RESERVAS
|--------------------------------------------------------------------------
*/

Route::get('/reservas', [ReservaController::class, 'create'])->name('reservas.create');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

/*
|--------------------------------------------------------------------------
| PERFIL
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| PAINEL ADMINISTRATIVO
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | USUÁRIOS
        |--------------------------------------------------------------------------
        */

        Route::resource('usuarios', UsuarioController::class);

        /*
        |--------------------------------------------------------------------------
        | CATEGORIAS
        |--------------------------------------------------------------------------
        */

        Route::resource('categorias', CategoriaController::class);

        /*
        |--------------------------------------------------------------------------
        | GALERIAS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'galerias',
            GaleriaAdminController::class
        );

        /*
        |--------------------------------------------------------------------------
        | EVENTOS
        |--------------------------------------------------------------------------
        */

        Route::resource('eventos', EventoAdminController::class);
        Route::get('/orcamento/{id}', [EventoAdminController::class, 'gerarPDF'])
            ->name('orcamento.pdf');

        Route::put(
            'eventos/{evento}/status',
            [EventoAdminController::class, 'alterarStatus']
        )->name('eventos.status');

        /*
        |--------------------------------------------------------------------------
        | EVENTOS SITE
        |--------------------------------------------------------------------------
        */



        Route::get(
            '/pagina-eventos',
            [PaginaEventoController::class, 'index']
        )->name('pagina-eventos.index');

        Route::post(
            '/pagina-eventos',
            [PaginaEventoController::class, 'update']
        )->name('pagina-eventos.update');


        /*
        |--------------------------------------------------------------------------
        | RESERVAS
        |--------------------------------------------------------------------------
        */

        Route::resource('reservas', ReservaAdminController::class);

        Route::put('reservas/{id}/status',[ReservaAdminController::class, 'alterarStatus']
        )->name('reservas.status');

        Route::post('reservas/{reserva}/aprovar',[ReservaAdminController::class, 'aprovar']
        )->name('reservas.aprovar');

        Route::post('reservas/{reserva}/rejeitar',[ReservaAdminController::class, 'rejeitar']
        )->name('reservas.rejeitar');

        /*
        |--------------------------------------------------------------------------
        | FINANCEIRO
        |--------------------------------------------------------------------------
        */

        Route::get('/financeiro', [FinanceiroController::class, 'index'])
            ->name('financeiro.index');


        /*
        |--------------------------------------------------------------------------
        | CARDAPIO ADMIN
        |--------------------------------------------------------------------------
        */

        //Route::get('/cardapio', [AdminCardapioController::class, 'index'])->name('cardapio.index');

        //Route::resource('cardapios', CardapioController::class);

        Route::resource('cardapios',AdminCardapioController::class );


       
    });

     /*
        |--------------------------------------------------------------------------
        | USUÁRIOS - RESERVAS
        |--------------------------------------------------------------------------
        */
        Route::get('/minhas-reservas', [ReservaController::class, 'minhasReservas'])
            ->name('reservas.minhas');

        Route::get('/minhas-reservas/{reserva}/editar', [ReservaController::class, 'edit'])
            ->name('reservas.edit');

        Route::put('/minhas-reservas/{reserva}', [ReservaController::class, 'update'])
            ->name('reservas.update');

        Route::delete('/minhas-reservas/{reserva}', [ReservaController::class, 'destroy'])
            ->name('reservas.destroy');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
