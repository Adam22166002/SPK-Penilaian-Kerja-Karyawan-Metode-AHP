@extends('layouts.admin')
@section('title','Data Kriteria')

@section('content')
<div class="container-fluid">
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="card">
        <div class="card-header">
            <h4 class="fw-bold">Data Kriteria</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                Tambah Kriteria
            </button>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($kriteria as $row)
                            <tr>
                                <td>{{ $row->kode }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ ucfirst($row->tipe) }}</td>
                                <td>
                                    <span class="badge bg-{{ $row->aktif ? 'success' : 'secondary' }}">
                                        {{ $row->aktif ? 'Ya' : 'Tidak' }}
                                    </span>
                                </td>

                                <td>
                                    <button class="btn btn-warning shadow btn-xs sharp me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $row->id }}">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>

                                    <form action="{{ route('kriteria.destroy',$row->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Hapus?')" class="btn btn-danger shadow btn-xs sharp">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            {{-- modal edit --}}
                            <div class="modal fade" id="modalEdit{{ $row->id }}">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('kriteria.update',$row->id) }}">
                                        @csrf @method('PUT')
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5>Edit Kriteria</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <input name="kode" value="{{ $row->kode }}" class="form-control mb-2">
                                                <input name="nama" value="{{ $row->nama }}" class="form-control mb-2">

                                                <textarea name="deskripsi" class="form-control mb-2">{{ $row->deskripsi }}</textarea>

                                                <select name="tipe" class="form-control mb-2">
                                                    <option value="benefit" {{ $row->tipe=='benefit'?'selected':'' }}>Benefit</option>
                                                    <option value="cost" {{ $row->tipe=='cost'?'selected':'' }}>Cost</option>
                                                </select>

                                                <label><input type="checkbox" name="aktif" {{ $row->aktif?'checked':'' }}> Aktif</label>

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

{{-- modal create --}}
<div class="modal fade" id="modalCreate">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('kriteria.store') }}">
            @csrf
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Tambah Kriteria</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input name="kode" class="form-control mb-2" placeholder="Kode (C1)" required>
                    <input name="nama" class="form-control mb-2" placeholder="Nama Kriteria" required>
                    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>

                    <select name="tipe" class="form-control mb-2">
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>

                    <label><input type="checkbox" name="aktif" checked> Aktif</label>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
