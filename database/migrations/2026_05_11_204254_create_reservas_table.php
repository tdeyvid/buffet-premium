<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('cliente');
            $table->string('telefone');
            $table->date('data_reserva');
            $table->integer('quantidade_pessoas');
            $table->string('tipo_evento');
            $table->text('mensagem')->nullable();
            $table->enum('status', [
                'pendente',
                'analise',
                'confirmada',
                'cancelada'
            ])->default('pendente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
