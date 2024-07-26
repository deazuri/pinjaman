<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriks extends Model
{
    use HasFactory;
    protected $table = 'matriks';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon', 'id');
    }
    public function bobotKriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_bobot_kriteria', 'id');
    }
}
