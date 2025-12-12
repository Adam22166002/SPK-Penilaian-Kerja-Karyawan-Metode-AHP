@extends('layouts.admin')
@section('title','Bobot Kriteria AHP')

@section('content')

<h4 class="fw-bold mb-3">Bobot Kriteria (AHP)</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card">
        <div class="card-header">
            <h4 class="fw-bold">Data Bobot Kriteria</h4>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                Tambah / Update Bobot
            </button>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="table">
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                <th>Bobot</th>
                                <th width="100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bobot as $item)
                            <tr>
                                <td>{{ $item->kriteria->nama }}</td>
                                <td>{{ number_format($item->bobot, 4) }}</td>
                                <td>
                                    <button class="btn btn-xs btn-warning shadow sharp me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit{{ $item->id }}">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('bobot.update', $item->id) }}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Edit Bobot - {{ $item->kriteria->nama }}</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label>Bobot</label>
                                                    <input type="number" step="0.0001" name="bobot" class="form-control"
                                                        value="{{ $item->bobot }}" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bobot.store') }}">
            @csrf
            <input type="hidden" name="periode_id" value="{{ $periode_id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah / Update Bobot Kriteria</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Pilih Kriteria</label>
                        <select name="kriteria_id" class="form-select" required>
                            @foreach(\App\Models\Kriteria::where('aktif', true)->get() as $kr)
                                <option value="{{ $kr->id }}">{{ $kr->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Bobot</label>
                        <input type="number" step="0.0001" name="bobot" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
