<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriterias';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id_kriteria','nama_kriteria','bobot', 'sifat'];
    protected $hidden = ['created_at', 'updated_at'];

   
    public function datakriteria()
    {
        return $this->belongsTo(DataKriteria::class, 'id_kriteria')->withDefault([
            'id_kriteria' => 'tidak ada',
        ]);
    }

    public function dabotkriteria()
    {
        return $this->hasMany(Bobot::class, 'id_kriteria');
    }

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon')->withDefault([
            'id_pemohon' => 'tidak ada',
        ]);
    }
}
