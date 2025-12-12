@extends('layouts.admin')
@section('title','Input Perbandingan AHP')
@section('content')

<h4 class="fw-bold mb-3">Input Perbandingan Kriteria (AHP)</h4>

@if(!$periode)
<div class="alert alert-warning">Tidak ada periode aktif.</div>
@else
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<form method="POST" action="{{ route('ahp.store') }}">
    @csrf
    <div class="card">
            <div class="card-header">
                <h4 class="fw-bold">Data Perbandingan Kriteria (AHP)</h4>
                <div class="mt-4 text-end">
                    <button class="btn btn-primary text-end">Simpan AHP</button>
                </div>
            </div>
            <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    @foreach($kriteria as $kr2)
                                        <th>{{ $kr2->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kriteria as $kr1)
                                <tr>
                                    <td>{{ $kr1->nama }}</td>
                                    @foreach($kriteria as $kr2)
                                        <td>
                                            @if($kr1->id == $kr2->id)
                                                <input class="form-control" value="1" disabled>
                                            @else
                                                <input type="number" 
                                                    step="0.0001" 
                                                    min="0.11" 
                                                    max="9"
                                                    name="{{ $kr1->id }}_{{ $kr2->id }}"
                                                    class="form-control"
                                                    value="{{ isset($perbandingan[$kr1->id][$kr2->id])
                                                            ? rtrim(rtrim($perbandingan[$kr1->id][$kr2->id], '0'), '.')
                                                            : '' }}"
                                                    required>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
    </div>
</form>

@endif

@endsection
