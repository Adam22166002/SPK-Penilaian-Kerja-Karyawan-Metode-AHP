<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodePenilaian extends Model
{
    protected $table = 'periode_penilaian';

    protected $fillable = [
        'nama','tanggal_mulai','tanggal_selesai','status'
    ];

    public function penilaian() {
        return $this->hasMany(Penilaian::class);
    }
}

