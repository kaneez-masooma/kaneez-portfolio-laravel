<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // frontend / backend / database / tools / exploring
            $table->enum('category', ['frontend', 'backend', 'database', 'tools', 'exploring']);
            $table->string('icon')->nullable(); // bootstrap-icons class, e.g. "bi-filetype-html"
            // Honest, non-numeric levels instead of fake percentages
            $table->enum('level', ['learning', 'comfortable', 'proficient'])->default('learning');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
