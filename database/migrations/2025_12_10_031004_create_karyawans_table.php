<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_karyawan')->unique();
            $table->string('nama');
            $table->string('departemen');
            $table->string('jabatan');
            $table->date('tanggal_masuk')->nullable();
            $table->enum('status', ['aktif','non_aktif']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('karyawan');
    }
};
