<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenilaian extends Model
{
    protected $table = 'detail_penilaian';

    protected $fillable = [
        'penilaian_id','kriteria_id',
        'skor_asli','skor_normalisasi','skor_terbobot'
    ];
}

