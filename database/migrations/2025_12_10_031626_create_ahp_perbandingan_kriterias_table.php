<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ahp_perbandingan_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periode_penilaian')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kriteria1_id')->constrained('kriteria')->cascadeOnDelete();
            $table->foreignId('kriteria2_id')->constrained('kriteria')->cascadeOnDelete();
            $table->decimal('nilai', 8, 4);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('ahp_perbandingan_kriteria');
    }
};

