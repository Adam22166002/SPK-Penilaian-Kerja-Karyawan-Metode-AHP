<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\PeriodePenilaian;
use App\Models\Kriteria;
use App\Models\Penilaian;

class DashboardController extends Controller
{
    public function index() 
    {
        $totalKaryawan = Karyawan::count();
        $totalPeriode = PeriodePenilaian::count();
        $totalKriteria = Kriteria::count();
        $totalPenilaian = Penilaian::count();

        $periodeAktif = PeriodePenilaian::where('status', 'aktif')->first();

        $topKaryawan = [];
        if ($periodeAktif) {
            $topKaryawan = Penilaian::with('karyawan')
                ->where('periode_id', $periodeAktif->id)
                ->orderBy('nilai_akhir', 'desc')
                ->take(3)
                ->get();
        }

        $chartLabels = [];
        $chartScores = [];

        if ($periodeAktif) {
            $karyawanSemua = Karyawan::all();

            foreach ($karyawanSemua as $k) {
                $penilaian = Penilaian::where('periode_id', $periodeAktif->id)
                    ->where('karyawan_id', $k->id)
                    ->first();

                $chartLabels[] = $k->nama;
                $chartScores[] = $penilaian ? $penilaian->nilai_akhir : 0;
            }
        }

        return view('dashboard', [
            'totalKaryawan' => $totalKaryawan,
            'totalPeriode' => $totalPeriode,
            'totalKriteria' => $totalKriteria,
            'totalPenilaian' => $totalPenilaian,
            'periodeAktif' => $periodeAktif,
            'topKaryawan' => $topKaryawan,
            'chartLabels' => $chartLabels,
            'chartScores' => $chartScores,
        ]);
    }
}