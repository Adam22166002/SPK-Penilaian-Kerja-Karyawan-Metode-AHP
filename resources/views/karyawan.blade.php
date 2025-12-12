@extends('layouts.admin')
@section('title','Data Karyawan')

@section('content')
<div class="container-fluid">
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold">Data Karyawan</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                Tambah Karyawan
            </button>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="table">
                        <thead>
                            <tr>
                                <th>Kode Karyawan</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawan as $row)
                            <tr>
                                <td>{{ $row->kode_karyawan }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->departemen }}</td>
                                <td>{{ $row->jabatan }}</td>
                                <td>
                                    <button class="btn btn-warning shadow btn-xs sharp me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $row->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>

                                    <form action="{{ route('karyawan.destroy',$row->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Hapus?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="modalEdit{{ $row->id }}">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('karyawan.update',$row->id) }}">
                                        @csrf @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Edit Karyawan</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <input name="kode_karyawan" class="form-control mb-2"
                                                    value="{{ $row->kode_karyawan }}" required>

                                                <input name="nama" class="form-control mb-2"
                                                    value="{{ $row->nama }}" required>

                                                <input name="departemen" class="form-control mb-2"
                                                    value="{{ $row->departemen }}" required>

                                                <input name="jabatan" class="form-control mb-2"
                                                    value="{{ $row->jabatan }}" required>
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
</div>

{{-- Modal Create --}}
<div class="modal fade" id="modalCreate">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('karyawan.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Karyawan</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input name="kode_karyawan" class="form-control mb-2" placeholder="Kode Karyawan" required>
                    <input name="nama" class="form-control mb-2" placeholder="Nama" required>
                    <input name="departemen" class="form-control mb-2" placeholder="Departemen" required>
                    <input name="jabatan" class="form-control mb-2" placeholder="Jabatan" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
