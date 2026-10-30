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
        Schema::create('ambients', function (Blueprint $table) {
            $table->id();
            $table->string('number', 20);
            $table->unsignedInteger('capacity');
            $table->enum('type', ['aula', 'laboratorio','taller'])->default('aula');
            $table->enum('status', ['disponible', 'ocupado', 'mantenimiento'])->default('disponible');
            $table->foreignId('training_center_id')->nullable()->constrained('training_centers')->nullOnDelete();
            $table->foreignId('area_id')->nullable()->constrained('areas')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambients');
    }
};
