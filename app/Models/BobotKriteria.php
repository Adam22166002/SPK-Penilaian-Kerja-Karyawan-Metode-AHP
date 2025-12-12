<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    protected $table = 'bobot_kriteria';

    protected $fillable = [
        'periode_id','kriteria_id','bobot','nilai_cr'
    ];
    public function kriteria()
{
    return $this->belongsTo(Kriteria::class, 'kriteria_id');
}

}
