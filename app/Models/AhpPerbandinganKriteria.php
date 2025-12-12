<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AhpPerbandinganKriteria extends Model
{
    protected $table = 'ahp_perbandingan_kriteria';

    protected $fillable = [
        'periode_id','user_id','kriteria1_id','kriteria2_id','nilai'
    ];
}

