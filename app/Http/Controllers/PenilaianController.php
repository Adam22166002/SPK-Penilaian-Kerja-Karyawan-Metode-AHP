<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\DetailPenilaian;
use App\Models\PeriodePenilaian;
use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\BobotKriteria;
use App\Services\SawService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
class PenilaianController extends Controller
{
    public function proses(Request $request, $periode_id)
    {
        $karyawan = Karyawan::all();
        $kriteria = Kriteria::where('aktif', true)->get();

        // Ambil bobot SAW yang sudah dihitung dari AHP
        // format: [kriteria_id => bobot]
        $bobot = BobotKriteria::where('periode_id', $periode_id)
            ->pluck('bobot', 'kriteria_id')
            ->toArray();

        // Array untuk menampung nilai input user
        $dataSaw = [];

        /**
         * 1. Mengambil nilai input user (nilai_1_2, nilai_3_5, dst)
         *
         * Format input:
         * name="nilai_{karyawan_id}_{kriteria_id}"
         * contoh:
         * nilai_5_3 = nilai karyawan id 5 pada kriteria id 3
         *
         * Data disimpan menjadi:
         * $dataSaw[karyawan_id]['nilai'][kriteria_id] = angka
         */
        foreach ($karyawan as $item) {
            foreach ($kriteria as $kr) {
                $dataSaw[$item->id]['nilai'][$kr->id] = $request->input(
                    'nilai_' . $item->id . '_' . $kr->id
                );
            }
        }

        // 2. Proses normalisasi dan perhitungan SAW
        $saw = new SawService();

        // normalisasi nilai per kriteria
        $normalized = $saw->normalize($dataSaw);

        // hitung skor akhir = sum(normalisasi * bobot)
        $finalScores = $saw->calculateFinalScore($normalized, $bobot);

        /**
         * 3. Simpan hasil perhitungan ke tabel penilaian
         *
         * - nilai_akhir: skor SAW
         * - peringkat: urutan dari skor tertinggi sampai terendah
         * - status: bisa dikembangkan (misal 'lulus', 'promosi')
         */
        $ranking = 1;
        foreach ($finalScores as $index => $nilai) {

            $penilaian = Penilaian::create([
                'karyawan_id' => $index,      // id karyawan
                'periode_id'  => $periode_id, // periode penilaian
                'nilai_akhir' => $nilai,      // skor SAW
                'peringkat'   => $ranking++,   // ranking otomatis
                'status'      => 'biasa'
            ]);

            /**
             * 4. Simpan detail penilaian untuk audit:
             *    - skor asli (input)
             *    - skor normalisasi
             *    - skor terbobot (normalisasi * bobot)
             */
            foreach ($kriteria as $kr) {
                DetailPenilaian::create([
                    'penilaian_id'     => $penilaian->id,
                    'kriteria_id'      => $kr->id,
                    'skor_asli'        => $dataSaw[$index]['nilai'][$kr->id],
                    'skor_normalisasi' => $normalized[$index]['nil_norm'][$kr->id],
                    'skor_terbobot'    => $normalized[$index]['nil_norm'][$kr->id] * $bobot[$kr->id],
                ]);
            }
        }

        return back()->with('success', 'Perhitungan SPK Berhasil!');
    }

    public function formInput($periode_id)
    {
        $periode = PeriodePenilaian::findOrFail($periode_id);
        $karyawan = Karyawan::all();
        $kriteria = Kriteria::where('aktif', true)->get();

        return view('penilaian.input', compact('periode', 'karyawan', 'kriteria'));
    }

    public function hasil($periode)
    {
        $periodeData = PeriodePenilaian::findOrFail($periode);
        $ranking = Penilaian::with('karyawan')
                    ->where('periode_id', $periode)
                    ->orderBy('nilai_akhir','desc')
                    ->get();

        return view('penilaian.hasil', compact('ranking','periodeData'));
    }

    public function penilaianPdf($periode)
        {
            $periodeData = PeriodePenilaian::findOrFail($periode);
            $ranking = Penilaian::with('karyawan')
                        ->where('periode_id',$periode)
                        ->orderBy('peringkat','asc')
                        ->get();

            $pdf = PDF::loadView('penilaian.pdf', compact('ranking','periodeData'))
                    ->setPaper('A4','portrait');

            return $pdf->download('laporan-penilaian-'.$periode.'.pdf');
        }

    }
