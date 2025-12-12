<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $kriteria = [
            ['kode' => 'C1', 'nama' => 'Kehadiran', 'tipe' => 'benefit'],
            ['kode' => 'C2', 'nama' => 'Pencapaian Target', 'tipe' => 'benefit'],
            ['kode' => 'C3', 'nama' => 'Disiplin', 'tipe' => 'benefit'],
            ['kode' => 'C4', 'nama' => 'Keaktifan', 'tipe' => 'benefit'],
            ['kode' => 'C5', 'nama' => 'Kepemimpinan', 'tipe' => 'benefit'],
        ];

        foreach ($kriteria as $item) {
            Kriteria::create([
                'kode' => $item['kode'],
                'nama' => $item['nama'],
                'tipe' => $item['tipe'],
                'aktif' => true,
            ]);
        }
    }
}

