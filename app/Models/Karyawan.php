<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'kode_karyawan','nama','departemen','jabatan',
        'tanggal_masuk','status'
    ];

    public function penilaian() {
        return $this->hasMany(Penilaian::class);
    }
}
