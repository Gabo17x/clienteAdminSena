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
        Schema::create('offers', function (Blueprint $table) {
            
            $table->id();
            $table->string('ficha', 20);
            $table->text('description');
            $table->string('type', 100);
            $table->string('duration', 50);
            $table->enum('modality', ['presencial', 'virtual'])->default('presencial');
            $table->enum('schedule', ['tarde', 'diurna', 'noche'])->default('diurna');
            $table->string('image')->nullable();
            $table->foreignId('area_id')->nullable()->constrained('areas')->nullOnDelete();
            $table->foreignId('training_center_id')->nullable()->constrained('training_centers')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
