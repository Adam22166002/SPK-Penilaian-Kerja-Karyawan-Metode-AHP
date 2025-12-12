<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index() {
        $karyawan = Karyawan::latest()->get();
        return view('karyawan', compact('karyawan'));
    }

    public function store(Request $request) {
        $request->validate([
            'kode_karyawan' => 'required|unique:karyawan',
            'nama' => 'required',
            'departemen' => 'required',
            'jabatan' => 'required',
        ]);

        Karyawan::create($request->all());

        return back()->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function update(Request $request, $id) {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update($request->all());

        return back()->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id) {
        Karyawan::findOrFail($id)->delete();
        return back()->with('success', 'Data karyawan dihapus');
    }
}

