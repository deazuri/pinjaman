<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatifs';
    protected $primaryKey = 'id_alternatif';
    public $incrementing = true;
    protected $fillable = ['kode', 'id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function datapemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id')->withDefault([
            'id' => 'tidak ada',
        ]);
    }
}
