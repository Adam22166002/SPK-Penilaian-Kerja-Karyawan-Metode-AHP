<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bobot_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periode_penilaian')->cascadeOnDelete();
            $table->foreignId('kriteria_id')->constrained('kriteria')->cascadeOnDelete();
            $table->decimal('bobot', 8, 4);
            $table->decimal('nilai_cr', 8, 4)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('bobot_kriteria');
    }
};
