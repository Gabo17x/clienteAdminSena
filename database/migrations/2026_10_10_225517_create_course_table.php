<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_number');
            $table->string('day');
            $table->foreignId('area_id')->nullable()->constrained('area')->nullOnDelete();
            $table->foreignId('training_center_id')->nullable()->constrained('training_center')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('course_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_teachers');
        Schema::dropIfExists('courses');
    }
};
