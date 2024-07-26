<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\DataKriteria;
use App\Models\Datker;
use App\Models\Matriks;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MatriksController extends Controller
{
    public function index()
    {
        $matriks = Matriks::with(['pemohon', 'bobotKriteria'])
            ->orderBy('id_pemohon')
            ->get();

        $groupedMatriks = [];

        foreach ($matriks as $data) {
            $idPemohon = $data->id_pemohon;

            if (!isset($groupedMatriks[$idPemohon])) {
                $groupedMatriks[$idPemohon] = [
                    'alternatif' => $data->pemohon->nama_pemohon,
                    'data' => []
                ];
            }

            $groupedMatriks[$idPemohon]['data'][] = [
                'kriteria' => $data->bobotKriteria->nama_kriteria,
                'nilai' => $data->nilai,
            ];
        }

        return view('Perhitungan.matriks_ternormalisasi', compact('groupedMatriks'));
    }

    public function normalisasi()
    {
        // Mendapatkan matriks keputusan
        $matriks = Matriks::with(['pemohon', 'bobotKriteria'])
            ->orderBy('id_pemohon')
            ->get();

        $groupedMatriks = [];
        $nilai_kuadrat_akar = [];

        foreach ($matriks as $data) {
            $idPemohon = $data->id_pemohon;

            if (!isset($groupedMatriks[$idPemohon])) {
                $groupedMatriks[$idPemohon] = [
                    'alternatif' => $data->pemohon->nama_pemohon,
                    'data' => []
                ];
            }

            $kriteria = $data->bobotKriteria->nama_kriteria;
            $nilai = $data->nilai;
            $sifat = $data->bobotKriteria->sifat; // Tambahkan informasi sifat

            if (!isset($nilai_kuadrat_akar[$kriteria])) {
                $nilai_kuadrat_akar[$kriteria] = 0;
            }

            // Hitung nilai kuadrat untuk normalisasi per kriteria
            $nilai_kuadrat_akar[$kriteria] += ($nilai * $nilai);

            $groupedMatriks[$idPemohon]['data'][] = [
                'kriteria' => $kriteria,
                'nilai' => $nilai,
                'sifat' => $sifat, // Tambahkan informasi sifat
                'nilai_normalisasi' => 0, // Inisialisasi nilai normalisasi
            ];
        }

        // Hitung nilai kuadrat akar untuk setiap kriteria
        foreach ($nilai_kuadrat_akar as $kriteria => $nilai_kuadrat) {
            $nilai_kuadrat_akar[$kriteria] = sqrt($nilai_kuadrat);
        }

        // Masukkan nilai normalisasi ke dalam $groupedMatriks
        foreach ($groupedMatriks as &$group) {
            foreach ($group['data'] as &$item) {
                $kriteria = $item['kriteria'];
                $nilai = $item['nilai'];
                $nilai_normalisasi = $nilai / $nilai_kuadrat_akar[$kriteria];
                $item['nilai_normalisasi'] = round($nilai_normalisasi, 3);
            }
        }

        return view('Perhitungan.nilai_matriks_ternormalisasi', compact('groupedMatriks'));
    }

    public function terbobot()
    {
        // Mendapatkan matriks keputusan
        $matriks = Matriks::with(['pemohon', 'bobotKriteria'])
            ->orderBy('id_pemohon')
            ->get();

        $groupedMatriks = [];
        $nilai_kuadrat_akar = [];

        foreach ($matriks as $data) {
            $idPemohon = $data->id_pemohon;

            if (!isset($groupedMatriks[$idPemohon])) {
                $groupedMatriks[$idPemohon] = [
                    'alternatif' => $data->pemohon->nama_pemohon,
                    'data' => []
                ];
            }

            $kriteria = $data->bobotKriteria->nama_kriteria;
            $nilai = $data->nilai;
            $sifat = $data->bobotKriteria->sifat;

            if (!isset($nilai_kuadrat_akar[$kriteria])) {
                $nilai_kuadrat_akar[$kriteria] = 0;
            }

            // Hitung nilai kuadrat untuk normalisasi per kriteria
            $nilai_kuadrat_akar[$kriteria] += ($nilai * $nilai);

            $groupedMatriks[$idPemohon]['data'][] = [
                'kriteria' => $kriteria,
                'nilai' => $nilai,
                'sifat' => $sifat,
                'nilai_normalisasi' => 0, // Inisialisasi nilai normalisasi
                'nilai_terbobot' => 0, // Inisialisasi nilai terbobot
            ];
        }

        // Mendapatkan bobot dari model Datker
        $bobotKriteria = Kriteria::pluck('bobot', 'nama_kriteria')->toArray();

        // Menghitung nilai normalisasi dan nilai terbobot
        foreach ($nilai_kuadrat_akar as $kriteria => $nilai_kuadrat) {
            $nilai_kuadrat_akar[$kriteria] = sqrt($nilai_kuadrat);
        }

        // Masukkan nilai normalisasi ke dalam $groupedMatriks
        foreach ($groupedMatriks as &$group) {
            foreach ($group['data'] as &$item) {
                $kriteria = $item['kriteria'];
                $nilai = $item['nilai'];
                $nilai_normalisasi = $nilai / $nilai_kuadrat_akar[$kriteria];
                $item['nilai_normalisasi'] = round($nilai_normalisasi, 3);
                $item['nilai_terbobot'] = round($item['nilai_normalisasi'] * $bobotKriteria[$kriteria], 3);
            }
        }

        return view('Perhitungan.ternormalisasi_terbobot', compact('groupedMatriks'));
    }


    public function solusiIdeal()
    {
        // Ambil data ternormalisasi terbobot dari hasil perhitungan sebelumnya
        $terbobotResult = $this->terbobot();
        $groupedMatriks = $terbobotResult->getData()['groupedMatriks']; // Sesuaikan dengan format yang benar

        // Inisialisasi matriks solusi ideal positif dan negatif
        $solusiIdealPositif = [];
        $solusiIdealNegatif = [];

        // Menginisialisasi nilai solusi ideal dengan nilai awal yang ekstrim
        foreach ($groupedMatriks as $key => $group) {
            foreach ($group['data'] as $item) {
                $kriteria = $item['kriteria'];
                $nilai_terbobot = $item['nilai_terbobot'];
                $sifat = $item['sifat']; // Tambahkan informasi sifat kriteria

                // Cek sifat kriteria (benefit atau cost) dan sesuaikan perhitungan solusi ideal
                if ($sifat == 'Benefit') {
                    if (!isset($solusiIdealPositif[$kriteria])) {
                        $solusiIdealPositif[$kriteria] = $nilai_terbobot;
                        $solusiIdealNegatif[$kriteria] = $nilai_terbobot;
                    } else {
                        // Memperbarui nilai solusi ideal positif dan negatif
                        $solusiIdealPositif[$kriteria] = max($solusiIdealPositif[$kriteria], $nilai_terbobot);
                        $solusiIdealNegatif[$kriteria] = min($solusiIdealNegatif[$kriteria], $nilai_terbobot);
                    }
                } elseif ($sifat == 'Cost') {
                    if (!isset($solusiIdealPositif[$kriteria])) {
                        $solusiIdealPositif[$kriteria] = $nilai_terbobot;
                        $solusiIdealNegatif[$kriteria] = $nilai_terbobot;
                    } else {
                        // Memperbarui nilai solusi ideal positif dan negatif
                        $solusiIdealPositif[$kriteria] = min($solusiIdealPositif[$kriteria], $nilai_terbobot);
                        $solusiIdealNegatif[$kriteria] = max($solusiIdealNegatif[$kriteria], $nilai_terbobot);
                    }
                }
            }
        }

        return view('Perhitungan.matriks_ideal', compact('solusiIdealPositif', 'solusiIdealNegatif'));
    }


    public function hitungJarakSolusiIdeal()
    {
        // Mendapatkan data terbobot dari matriks yang telah dihitung sebelumnya
        $groupedMatriks = $this->terbobot()->getData()['groupedMatriks'];

        // Inisialisasi matriks solusi ideal positif dan negatif dari fungsi solusiIdeal()
        $solusiIdeal = $this->solusiIdeal();
        $solusiIdealPositif = $solusiIdeal['solusiIdealPositif'];
        $solusiIdealNegatif = $solusiIdeal['solusiIdealNegatif'];

        $jarakSolusiIdealPositif = [];
        $jarakSolusiIdealNegatif = [];

        // Loop untuk setiap alternatif
        foreach ($groupedMatriks as $alternatif => $nilai) {
            $jumlahSIP = 0; // Inisialisasi jumlah jarak solusi ideal positif
            $jumlahSIN = 0; // Inisialisasi jumlah jarak solusi ideal negatif

            // Ambil nama alternatif
            $namaAlternatif = $nilai['alternatif'];

            // Loop untuk setiap kriteria
            foreach ($nilai['data'] as $item) { // Ubah $nilai menjadi $nilai['data']
                $kriteria = $item['kriteria'];

                // Menghitung jarak solusi ideal positif
                if ($item['sifat'] == 'Benefit') {
                    $jarakSIP = pow($item['nilai_terbobot'] - $solusiIdealPositif[$kriteria], 2);
                } elseif ($item['sifat'] == 'Cost') {
                    $jarakSIP = pow($solusiIdealPositif[$kriteria] - $item['nilai_terbobot'], 2);
                }
                $jumlahSIP += $jarakSIP;

                // Menghitung jarak solusi ideal negatif
                if ($item['sifat'] == 'Benefit') {
                    $jarakSIN = pow($item['nilai_terbobot'] - $solusiIdealNegatif[$kriteria], 2);
                } elseif ($item['sifat'] == 'Cost') {
                    $jarakSIN = pow($solusiIdealNegatif[$kriteria] - $item['nilai_terbobot'], 2);
                }
                $jumlahSIN += $jarakSIN;
            }

            // Menghitung akar kuadrat dari jumlah jarak
            $jarakSolusiIdealPositif[$namaAlternatif] = sqrt($jumlahSIP);
            $jarakSolusiIdealNegatif[$namaAlternatif] = sqrt($jumlahSIN);
        }

        return view('Perhitungan.jarak_solusi_ideal', compact('jarakSolusiIdealPositif', 'jarakSolusiIdealNegatif'));
    }

    // public function nilaiPreferensi()
    // {
    //     $hasilHitungJarak = $this->hitungJarakSolusiIdeal();

    //     $jarakSolusiIdealPositif = $hasilHitungJarak['jarakSolusiIdealPositif'];
    //     $jarakSolusiIdealNegatif = $hasilHitungJarak['jarakSolusiIdealNegatif'];

    //     $nilaiPreferensi = [];

    //     foreach ($jarakSolusiIdealPositif as $nama => $jarakPositif) {
    //         $nilaiPreferensi[] = [
    //             'nama' => $nama,
    //             'nilai' => $jarakSolusiIdealNegatif[$nama] / ($jarakSolusiIdealNegatif[$nama] + $jarakPositif),
    //         ];
    //     }

    //     // Mengurutkan berdasarkan nilai preferensi
    //     usort($nilaiPreferensi, function ($a, $b) {
    //         return $b['nilai'] <=> $a['nilai'];
    //     });

    //     // Menambahkan nomor urut
    //     $nomorUrut = 1;
    //     foreach ($nilaiPreferensi as &$preferensi) {
    //         $preferensi['nomor_urut'] = $nomorUrut;
    //         $nomorUrut++;
    //     }

    //     return view('Perhitungan.nilai_preferensi', compact('nilaiPreferensi'));
    // }
    public function nilaiPreferensi()
    {
        $hasilHitungJarak = $this->hitungJarakSolusiIdeal();

        $jarakSolusiIdealPositif = $hasilHitungJarak['jarakSolusiIdealPositif'];
        $jarakSolusiIdealNegatif = $hasilHitungJarak['jarakSolusiIdealNegatif'];

        $nilaiPreferensi = [];

        foreach ($jarakSolusiIdealPositif as $nama => $jarakPositif) {
            $nilaiPreferensi[] = [
                'nama' => $nama,
                'nilai' => $jarakSolusiIdealNegatif[$nama] / ($jarakSolusiIdealNegatif[$nama] + $jarakPositif),
                'nomor_urut' => 0, // Inisialisasi nomor_urut
            ];
        }

        // Mengurutkan berdasarkan nilai preferensi
        usort($nilaiPreferensi, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // Menambahkan nomor urut
        $nomorUrut = 1;
        foreach ($nilaiPreferensi as &$preferensi) {
            $preferensi['nomor_urut'] = $nomorUrut;
            $nomorUrut++;

            // Mengecek jika nomor urut sudah mencapai 50, hentikan perulangan
            if ($nomorUrut > 50) {
                break;
            }
        }

        // Hanya ambil 50 data pertama
        $nilaiPreferensi = array_slice($nilaiPreferensi, 0, 50);

        return view('Perhitungan.nilai_preferensi', compact('nilaiPreferensi'));
    }

    public function nilaiPreferensiPrint()
    {
        $hasilHitungJarak = $this->hitungJarakSolusiIdeal();

        $jarakSolusiIdealPositif = $hasilHitungJarak['jarakSolusiIdealPositif'];
        $jarakSolusiIdealNegatif = $hasilHitungJarak['jarakSolusiIdealNegatif'];

        $nilaiPreferensi = [];

        foreach ($jarakSolusiIdealPositif as $nama => $jarakPositif) {
            $nilaiPreferensi[] = [
                'nama' => $nama,
                'nilai' => $jarakSolusiIdealNegatif[$nama] / ($jarakSolusiIdealNegatif[$nama] + $jarakPositif),
                'nomor_urut' => 0, // Inisialisasi nomor_urut
            ];
        }

        // Mengurutkan berdasarkan nilai preferensi
        usort($nilaiPreferensi, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // Menambahkan nomor urut
        $nomorUrut = 1;
        foreach ($nilaiPreferensi as &$preferensi) {
            $preferensi['nomor_urut'] = $nomorUrut;
            $nomorUrut++;

            // Mengecek jika nomor urut sudah mencapai 50, hentikan perulangan
            if ($nomorUrut > 50) {
                break;
            }
        }

        // Hanya ambil 50 data pertama
        $nilaiPreferensi = array_slice($nilaiPreferensi, 0, 50);

        $pdf = Pdf::loadView('Perhitungan.nilai_preferensi_print', compact('nilaiPreferensi'));

        return $pdf->download('nilai_preferensi.pdf');
    }



}
