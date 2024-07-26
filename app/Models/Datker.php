<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datker extends Model
{
    use HasFactory;
    protected $table = 'datkers';
    protected $primaryKey = 'id_kriteria';
    public $incrementing = true;
    protected $fillable = ['nama_kriteria', 'bobot','poin1', 'poin2', 'poin3', 'poin4','poin5', 'sifat'];
    protected $hidden = ['created_at', 'updated_at'];

    public function datapemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id')->withDefault([
            'id' => 'tidak ada',
        ]);
    }
}
