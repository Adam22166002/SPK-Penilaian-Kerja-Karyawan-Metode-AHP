<?php
namespace App\Services;

class AhpService
{
    // 1. NORMALISASI MATRIKS PERBANDINGAN AHP
    public function normalizeMatrix($matrix)
    {
        $columnSum = [];
        $size = count($matrix);

        // Hitung jumlah tiap kolom matriks AHP
        for ($col = 0; $col < $size; $col++) {
            $columnSum[$col] = array_sum(array_column($matrix, $col));
        }

        // Normalisasi matriks:
        // value(i,j) / total_kolom(j)
        $normalized = [];
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $normalized[$i][$j] = $matrix[$i][$j] / $columnSum[$j];
            }
        }

        return $normalized;
    }

    // 2. HITUNG BOBOT (EIGEN VECTOR)
    public function calculateWeights($normalizedMatrix)
    {
        $size = count($normalizedMatrix);
        $weights = [];

        // Rata-rata setiap baris = bobot AHP
        for ($i = 0; $i < $size; $i++) {
            $weights[$i] = array_sum($normalizedMatrix[$i]) / $size;
        }

        return $weights;
    }

    // 3. HITUNG CR (CONSISTENCY RATIO)
    public function calculateCR($matrix, $weights)
    {
        $size = count($matrix);

        // Hitung λmax (nilai eigen terbesar)
        $lambdaMax = 0;
        for ($i = 0; $i < $size; $i++) {
            $rowSum = 0;

            // Hitung (matrix * weight)
            for ($j = 0; $j < $size; $j++) {
                $rowSum += $matrix[$i][$j] * $weights[$j];
            }

            // λ_i = hasil / bobot
            $lambdaMax += $rowSum / $weights[$i];
        }

        // rata-rata λ
        $lambdaMax /= $size;

        // Consistency Index
        $ci = ($lambdaMax - $size) / ($size - 1);

        // Random Index dari tabel AHP
        $ri = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];

        // Consistency Ratio (CR)
        $cr = $ci / $ri[$size];

        return $cr;
    }
}
