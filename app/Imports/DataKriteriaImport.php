<?php

// Import class without ToModel and WithHeadingRow
namespace App\Imports;

use App\Models\DataKriteria;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DataKriteriaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Assuming your Excel columns are named id_pemohon, pendapatan, plafond, jw, angsuran, jaminan
            DataKriteria::create([
                'id_pemohon' => $row['id_pemohon'],
                'pendapatan' => $row['pendapatan'],
                'plafond' => $row['plafond'],
                'jw' => $row['jw'],
                'angsuran' => $row['angsuran'],
                'jaminan' => $row['jaminan'],
            ]);
        }
    }
}
