<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\AhpPerbandinganKriteria;
use App\Models\BobotKriteria;
use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;

class AhpController extends Controller
{
    public function index() 
    {
        $kriteria = Kriteria::where('aktif', true)->get();
        $periode = PeriodePenilaian::where('status','aktif')->first();

        // Array untuk menampung nilai perbandingan kriteria (jika sudah ada)
        $perbandingan = [];

        // Cek apakah ada periode aktif
        if ($periode) {

            // Ambil semua data perbandingan AHP untuk periode aktif
            $data = AhpPerbandinganKriteria::where('periode_id', $periode->id)->get();

            // Masukkan ke array dua dimensi:
            // contoh: [kriteria1_id][kriteria2_id] = nilai perbandingan
            foreach ($data as $d) {
                $perbandingan[$d->kriteria1_id][$d->kriteria2_id] = $d->nilai;
            }
        }
        return view('ahp', compact('kriteria','periode','perbandingan'));
    }

    public function store(Request $request)
    {
        $periode = PeriodePenilaian::where('status','aktif')->first();
        $kriteria = Kriteria::all();

        /**
         * Looping 2 dimensi:
         * - c1 sebagai baris matriks AHP
         * - c2 sebagai kolom matriks AHP
         * 
         * Matriks AHP bentuknya NxN
         * Contoh:
         *               KR1    KR2    KR3
         *   KR1         1     A12    A13
         *   KR2        1/A12   1     A23
         *   KR3        1/A13  1/A23   1
         * 
         * Kita menyimpan setiap pasangan (c1 != c2)
         */
        foreach ($kriteria as $c1) {
            foreach ($kriteria as $c2) {

                // Abaikan diagonal matriks (KR1 vs KR1 = 1)
                if ($c1->id != $c2->id) {
                    AhpPerbandinganKriteria::updateOrCreate(
                        [
                            'periode_id' => $periode->id,   // periode aktif
                            'kriteria1_id' => $c1->id,       // baris matriks
                            'kriteria2_id' => $c2->id,       // kolom matriks
                        ],
                        [
                            'user_id' => auth()->id(),
                            'nilai' => $request->input($c1->id . '_' . $c2->id) // nilai perbandingan
                        ]
                    );
                }
            }
        }
        return back()->with('success','Perbandingan AHP disimpan');
    }
}
