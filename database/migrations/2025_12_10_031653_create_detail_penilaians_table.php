<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detail_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penilaian_id')->constrained('penilaian')->cascadeOnDelete();
            $table->foreignId('kriteria_id')->constrained('kriteria')->cascadeOnDelete();
            $table->decimal('skor_asli', 8, 2);
            $table->decimal('skor_normalisasi', 8, 4);
            $table->decimal('skor_terbobot', 8, 4);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('detail_penilaian');
    }
};

