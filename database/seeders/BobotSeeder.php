<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kodeKriteria = ['C1', 'C2', 'C3', 'C4', 'C5'];
        $namaKriteria = ['Pendapatan', 'Plafond', 'Jw', 'Angsuran', 'Jaminan'];

        $bobot = ['4', '5', '3', '4', '3'];

        $sifat = ['Benefit', 'Cost', 'Cost', 'Benefit', 'Benefit'];

        for ($i = 0; $i < count($kodeKriteria); $i++) {
            \App\Models\Kriteria::create([
                'id' => $i + 1,
                'id_kriteria' => $kodeKriteria[$i],
                'nama_kriteria' => $namaKriteria[$i],
                'bobot' => $bobot[$i],
                'sifat' => $sifat[$i],
            ]);
        }

        $pendapatan = [
            [
                'id_kriteria' => '1',
                'poin' => '1',
                'keterangan' => '<=1.000.000'
            ],
            [
                'id_kriteria' => '1',
                'poin' => '2',
                'keterangan' => '1.000.001 – 2.500.000'
            ],
            [
                'id_kriteria' => '1',
                'poin' => '3',
                'keterangan' => '2.500.001 – 3.500.000'
            ],
            [
                'id_kriteria' => '1',
                'poin' => '4',
                'keterangan' => '3.500.001 – 4.500.000'
            ],
            [
                'id_kriteria' => '1',
                'poin' => '5',
                'keterangan' => '>4.500.000'
            ],
        ];

        $plafond = [
            [
                'id_kriteria' => '2',
                'poin' => '1',
                'keterangan' => '>4.500.000'
            ],
            [
                'id_kriteria' => '2',
                'poin' => '2',
                'keterangan' => '3.500.001 – 4.500.000'
            ],
            [
                'id_kriteria' => '2',
                'poin' => '3',
                'keterangan' => '2.500.001 – 3.500.000'
            ],
            [
                'id_kriteria' => '2',
                'poin' => '4',
                'keterangan' => '2.000.001 – 2.500.000'
            ],
            [
                'id_kriteria' => '2',
                'poin' => '5',
                'keterangan' => '<2.000.001'
            ],
        ];
        
        $jw= [
            [
                'id_kriteria' => '3',
                'poin' => '1',
                'keterangan' => '>=30'
            ],
            [
                'id_kriteria' => '3',
                'poin' => '2',
                'keterangan' => '21 – 29 '
            ],
            [
                'id_kriteria' => '3',
                'poin' => '3',
                'keterangan' => '16 – 20 '
            ],
            [
                'id_kriteria' => '3',
                'poin' => '4',
                'keterangan' => '11 – 15 '
            ],
            [
                'id_kriteria' => '3',
                'poin' => '5',
                'keterangan' => '<=10'
            ],
        ];

        $angsuran = [
            [
                'id_kriteria' => '4',
                'poin' => '1',
                'keterangan' => '<=100.000'
            ],
            [
                'id_kriteria' => '4',
                'poin' => '2',
                'keterangan' => '100.001 – 200.000 '
            ],
            [
                'id_kriteria' => '4',
                'poin' => '3',
                'keterangan' => '200.001 – 300.000 '
            ],
            [
                'id_kriteria' => '4',
                'poin' => '4',
                'keterangan' => '300.001 – 400.000 '
            ],
            [
                'id_kriteria' => '4',
                'poin' => '5',
                'keterangan' => '>400.000'
            ],
        ];

        $jaminan = [
            [
                'id_kriteria' => '5',
                'poin' => '1',
                'keterangan' => '<=2.000.000'
            ],
            [
                'id_kriteria' => '5',
                'poin' => '2',
                'keterangan' => '2.000.001 – 3.000.000 '
            ],
            [
                'id_kriteria' => '5',
                'poin' => '3',
                'keterangan' => '3.000.001 – 4.000.000 '
            ],
            [
                'id_kriteria' => '5',
                'poin' => '4',
                'keterangan' => '4.000.001 – 5.000.000 '
            ],
            [
                'id_kriteria' => '5',
                'poin' => '5',
                'keterangan' => '>5.000.000'
            ],
        ];


        $dataKriteria = [$pendapatan, $plafond, $jw, $angsuran, $jaminan];

        for ($i = 0; $i < count($dataKriteria); $i++) {
            for ($j = 0; $j < count($dataKriteria[$i]); $j++) {
                \App\Models\Bobot::create([
                    'id_kriteria' => $dataKriteria[$i][$j]['id_kriteria'],
                    'poin' => $dataKriteria[$i][$j]['poin'],
                    'keterangan' => $dataKriteria[$i][$j]['keterangan'],
                ]);
            }
        }
        
    }
}
