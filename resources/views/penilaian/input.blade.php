@extends('layouts.admin')

@section('title', 'Input Nilai Penilaian Karyawan')

@section('content')
<div class="container py-4">

    <h3 class="fw-bold mb-3">Input Nilai Penilaian Karyawan</h3>
    <p class="text-muted">
        Periode: <strong>{{ $periode->nama }}</strong> <br>
        Tanggal: {{ $periode->tanggal_mulai }} s/d {{ $periode->tanggal_selesai }}
    </p>

    <form action="{{ route('penilaian.proses', $periode->id) }}" method="POST">
        @csrf

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th style="width: 200px;">Nama Karyawan</th>
                                @foreach ($kriteria as $kr)
                                    <th>{{ $kr->nama }} <br> <small>({{ $kr->kode }})</small></th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($karyawan as $ky)
                            <tr>
                                <td>
                                    <strong>{{ $ky->nama }}</strong> <br>
                                    <small>{{ $ky->departemen }} - {{ $ky->jabatan }}</small>
                                </td>

                                @foreach ($kriteria as $kr)
                                <td class="text-center">
                                    <input 
                                        type="number" 
                                        name="nilai_{{ $ky->id }}_{{ $kr->id }}" 
                                        class="form-control text-center"
                                        min="0" 
                                        max="100" 
                                        step="1" 
                                        placeholder="0 - 100"
                                        required>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-calculator me-1"></i> Proses Penilaian
                    </button>
                </div>

            </div>
        </div>

    </form>

</div>
@endsection
