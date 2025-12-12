<h3>Laporan Hasil Penilaian Karyawan</h3>
<p>Periode: {{ $periodeData->nama }}</p>

<table width="100%" border="1" cellpadding="6" cellspacing="0">
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
