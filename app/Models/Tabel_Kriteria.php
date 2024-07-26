<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabel_Kriteria extends Model
{
    use HasFactory;
    protected $table = 'tabel__kriterias';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['kode_kr', 'kriteria','keterangan'];
    protected $hidden = ['created_at', 'updated_at'];
}
