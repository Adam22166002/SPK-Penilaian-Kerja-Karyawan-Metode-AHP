<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = [
        'kode','nama','deskripsi','tipe','aktif'
    ];
    public function bobot()
{
    return $this->hasOne(BobotKriteria::class, 'kriteria_id');
}

}
