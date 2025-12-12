<?php
namespace App\Http\Controllers;

use App\Models\PeriodePenilaian;
use Illuminate\Http\Request;

class PeriodePenilaianController extends Controller
{
    public function index()
    {
        $periode = PeriodePenilaian::latest()->get();
        return view('penilaian.periode_penilaian', compact('periode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'required',
        ]);

        PeriodePenilaian::create($request->all());

        return back()->with('success', 'Periode Penilaian berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $row = PeriodePenilaian::findOrFail($id);
        $row->update($request->all());

        return back()->with('success', 'Periode Penilaian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PeriodePenilaian::findOrFail($id)->delete();
        return back()->with('success', 'Periode Penilaian dihapus.');
    }
}
