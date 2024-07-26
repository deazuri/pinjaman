<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jaminan extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'jaminans';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];


    public function datapemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon')->withDefault([
            'id_pemohon' => 'tidak ada',
        ]);
    }
    public function datajaminan()
    {
        return $this->belongsTo(DataKriteria::class, 'id_kriteria')->withDefault([
            'id_kriteria' => 'tidak ada',
        ]);
    }
}


