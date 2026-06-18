<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('reserva_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('cliente');
            $table->string('telefone')
                ->nullable();

            $table->string('tipo_evento');
            $table->date('data_evento');
            $table->integer('convidados');

            $table->decimal('valor', 10, 2)
                ->default(0);

            $table->text('descricao')
                ->nullable();

            $table->text('observacoes')
                ->nullable();

            $table->enum('status', [
                'confirmado',
                'finalizado',
                'cancelado'
            ])->default('confirmado');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
