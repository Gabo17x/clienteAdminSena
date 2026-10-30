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
        Schema::create('quienes_somos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo', 150);
            $table->text('descripcion');
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
            $table->text('valores')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->string('video', 255)->nullable();
            $table->enum('estado', ['publicado', 'borrador'])->default('publicado');
            $table->foreignId('creado_por')->nullable()->constrained('users')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quienes_somos');
    }
};
