<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('becas')){
            Schema::create('becas', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->text('descripcion');
                $table->json('tipo');
                $table->integer('promedio')->nullable();
                $table->string('sexo')->nullable();
                $table->string('semestre')->nullable();
                $table->integer('edad')->nullable();
                $table->string('carrera')->nullable();
                $table->text('enlace')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('becas');
    }
};
