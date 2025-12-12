<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    protected $fillable = [
        'karyawan_id','periode_id','nilai_akhir','peringkat','status','catatan'
    ];

    public function detail() {
        return $this->hasMany(DetailPenilaian::class);
    }
    public function karyawan()
{
    return $this->belongsTo(Karyawan::class, 'karyawan_id');
}
public function periode()
{
    return $this->belongsTo(PeriodePenilaian::class, 'periode_id');
}

}

