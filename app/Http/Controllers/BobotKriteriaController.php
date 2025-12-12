<?php

namespace App\Http\Controllers;

use App\Models\BobotKriteria;
use App\Models\Kriteria;
use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;

class BobotKriteriaController extends Controller
{
    public function index()
{

    $periode = PeriodePenilaian::where('status', 'aktif')->first();
    if (!$periode) {
        return back()->with('error', 'Belum ada periode penilaian yang aktif.');
    }

    $periode_id = $periode->id;

    $kriteria = Kriteria::where('aktif', true)->get();

    foreach ($kriteria as $kr) {
        BobotKriteria::firstOrCreate(
            [
                'periode_id'  => $periode_id,
                'kriteria_id' => $kr->id,
            ],
            [
                'bobot'    => 0,
                'nilai_cr' => 0,
            ]
        );
    }

    $bobot = BobotKriteria::with('kriteria')
                ->where('periode_id', $periode_id)
                ->get();

    return view('ahp-bobot', compact('bobot', 'periode_id', 'periode'));
}

    public function store(Request $request)
    {
        $request->validate([
            'periode_id' => 'required',
            'kriteria_id' => 'required',
            'bobot' => 'required|numeric|min:0',
        ]);

        BobotKriteria::updateOrCreate(
            [
                'periode_id' => $request->periode_id,
                'kriteria_id' => $request->kriteria_id
            ],
            [
                'bobot' => $request->bobot
            ]
        );

        return back()->with('success', 'Bobot berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bobot' => 'required|numeric|min:0'
        ]);

        $bobot = BobotKriteria::findOrFail($id);
        $bobot->update([
            'bobot' => $request->bobot
        ]);

        return back()->with('success', 'Bobot berhasil diperbarui.');
    }
}

