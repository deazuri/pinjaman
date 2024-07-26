<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $table = 'bobots';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id_kriteria', 'poin','keterangan'];
    protected $hidden = ['created_at', 'updated_at'];

    public function datapemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id')->withDefault([
            'id' => 'tidak ada',
        ]);
    }
    public function bobotkriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria')->withDefault([
            'id_kriteria' => 'tidak ada',
        ]);
    }
}
