<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');

            //Primera llave foranea
            $table->foreignId('area_id')->nullable()->constrained('area')->nullOnDelete();

            //Segunda llave foranea
            $table->foreignId('training_center_id')->nullable()->constrained('training_center')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};