<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class DataKriteria extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'data_kriterias';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];


    public function datapemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon')->withDefault([
            'id_pemohon' => 'tidak ada',
        ]);
    }

    public function bobotkriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria')->withDefault([
            'id_kriteria' => 'tidak ada',
        ]);
    }
}

