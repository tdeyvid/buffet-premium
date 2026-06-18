<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagina_eventos', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | TOPO DA PÁGINA
            |--------------------------------------------------------------------------
            */

            $table->string('titulo')->nullable();
            $table->text('subtitulo')->nullable();

            /*
            |--------------------------------------------------------------------------
            | TIPOS DE EVENTOS
            |--------------------------------------------------------------------------
            */

            $table->string('casamento_titulo')->nullable();
            $table->text('casamento_texto')->nullable();

            $table->string('aniversario_titulo')->nullable();
            $table->text('aniversario_texto')->nullable();

            $table->string('formatura_titulo')->nullable();
            $table->text('formatura_texto')->nullable();

            $table->string('corporativo_titulo')->nullable();
            $table->text('corporativo_texto')->nullable();

            /*
            |--------------------------------------------------------------------------
            | GALERIA
            |--------------------------------------------------------------------------
            */

            $table->string('galeria_titulo')->nullable();
            $table->text('galeria_descricao')->nullable();


            $table->longText('foto1')->nullable();
            $table->longText('foto2')->nullable();
            $table->longText('foto3')->nullable();
            $table->longText('foto4')->nullable();

            /*
            |--------------------------------------------------------------------------
            | DIFERENCIAIS
            |--------------------------------------------------------------------------
            */

            $table->string('diferenciais_titulo')->nullable();

            $table->string('diferencial_1')->nullable();
            $table->string('diferencial_2')->nullable();
            $table->string('diferencial_3')->nullable();
            $table->string('diferencial_4')->nullable();

            /*
            |--------------------------------------------------------------------------
            | CTA FINAL
            |--------------------------------------------------------------------------
            */

            $table->string('cta_titulo')->nullable();
            $table->text('cta_texto')->nullable();
            $table->string('cta_botao')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagina_eventos');
        
        Schema::table('pagina_eventos', function (Blueprint $table) {

            $table->string('foto1')->nullable()->change();
            $table->string('foto2')->nullable()->change();
            $table->string('foto3')->nullable()->change();
            $table->string('foto4')->nullable()->change();

        });
    }
};
