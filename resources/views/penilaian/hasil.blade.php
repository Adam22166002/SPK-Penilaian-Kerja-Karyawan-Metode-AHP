@extends('layouts.admin')
@section('title','Hasil Penilaian')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="fw-bold mb-3">Hasil Penilaian — {{ $periodeData->nama }}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example3" class="table">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Karyawan</th>
                        <th>Nilai Akhir</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($ranking as $row)
                    <tr>
                        <td>{{ $row->peringkat }}</td>
                        <td>{{ $row->karyawan->nama }}</td>
                        <td>{{ number_format($row->nilai_akhir,4) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
