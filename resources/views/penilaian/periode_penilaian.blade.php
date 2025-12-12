@extends('layouts.admin')
@section('title','Periode Penilaian')

@section('content')
<div class="container-fluid">
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold">Periode Penilaian</h4>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
            Tambah Periode
        </button>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="table">
                        <thead>
                            <tr>
                                <th>Nama Periode</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($periode as $row)
                            <tr>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->tanggal_mulai }}</td>
                                <td>{{ $row->tanggal_selesai }}</td>
                                <td>
                                    <span class="badge bg-{{ $row->status=='aktif' ? 'success' : ($row->status=='draft'?'secondary':'info') }}">
                                        {{ ucfirst($row->status) }}
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-warning btn-xs shadow sharp me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $row->id }}">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>

                                    <form action="{{ route('periode-penilaian.destroy',$row->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Hapus periode ini?')"
                                            class="btn btn-danger btn-xs shadow sharp">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="modalEdit{{ $row->id }}">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('periode-penilaian.update', $row->id) }}">
                                        @csrf @method('PUT')
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5>Edit Periode</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <input name="nama" value="{{ $row->nama }}"
                                                    class="form-control mb-2" required>

                                                <label>Tanggal Mulai</label>
                                                <input type="date" name="tanggal_mulai"
                                                    value="{{ $row->tanggal_mulai }}"
                                                    class="form-control mb-2" required>

                                                <label>Tanggal Selesai</label>
                                                <input type="date" name="tanggal_selesai"
                                                    value="{{ $row->tanggal_selesai }}"
                                                    class="form-control mb-2" required>

                                                <label>Status</label>
                                                <select name="status" class="form-control mb-2">
                                                    <option value="draft" {{ $row->status=='draft'?'selected':'' }}>Draft</option>
                                                    <option value="aktif" {{ $row->status=='aktif'?'selected':'' }}>Aktif</option>
                                                    <option value="selesai" {{ $row->status=='selesai'?'selected':'' }}>Selesai</option>
                                                </select>
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

</div>

{{-- MODAL CREATE --}}
<div class="modal fade" id="modalCreate">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('periode-penilaian.store') }}">
            @csrf
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Tambah Periode Penilaian</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input name="nama" class="form-control mb-2" placeholder="Contoh: Penilaian Semester 1 2025" required>

                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control mb-2" required>

                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control mb-2" required>

                    <label>Status</label>
                    <select name="status" class="form-control mb-2">
                        <option value="draft">Draft</option>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                    </select>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
