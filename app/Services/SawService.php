<?php
namespace App\Services;

class SawService
{
    // 1. NORMALISASI NILAI SAW
    public function normalize($data)
    {
        $normalized = [];
        $maxValue = [];

        // Cari nilai maksimum per kriteria
        foreach ($data as $item) {
            foreach ($item['nilai'] as $key => $value) {
                $value = $value ?? 0;
                $maxValue[$key] = max($maxValue[$key] ?? 0, $value);
            }
        }

        // Normalisasi value / max_per_kriteria
        foreach ($data as $i => $item) {
            foreach ($item['nilai'] as $key => $value) {
                $normalized[$i]['nil_norm'][$key] = 
                    $value / ($maxValue[$key] ?: 1);
            }
        }

        return $normalized;
    }

    // 2. HITUNG SKOR AKHIR SAW
    public function calculateFinalScore($normalized, $weights)
    {
        $result = [];

        foreach ($normalized as $i => $item) {
            $score = 0;

            // Skor = Σ (normalisasi × bobot)
            foreach ($item['nil_norm'] as $key => $value) {
                $score += $value * $weights[$key];
            }

            $result[$i] = $score;
        }

        return $result;
    }
}
