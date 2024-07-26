<?php 

namespace App\Service;

use App\Models\Kriteria;
use App\Models\Bobot;

class KriteriaService {
    
    public static function checkPendapatan($pendapatan)
    {
        $idPendapatan = Kriteria::where('nama_kriteria', 'Pendapatan')->first();

        $bobotPendapatan = Bobot::where('id_kriteria', $idPendapatan->id)->get();

        foreach ($bobotPendapatan as $bobot) {
            $poin = $bobot->poin;

            // Manually check the conditions
            if ($bobot->keterangan === '<=1.000.000' && $pendapatan <= 1000000) {
                return $poin;
            } elseif ($bobot->keterangan === '1.000.001 – 2.500.000' && $pendapatan >= 1000001 && $pendapatan <= 2500000) {
                return $poin;
            } elseif ($bobot->keterangan === '2.500.001 – 3.500.000' && $pendapatan >= 2500001 && $pendapatan <= 3500000) {
                return $poin;
            } elseif ($bobot->keterangan === '3.500.001 – 4.500.000' && $pendapatan >= 3500000 && $pendapatan <= 4500000) {
                return $poin;
            } elseif ($bobot->keterangan === '>4.500.000' && $pendapatan > 4500000) {
                return $poin;
            }
        }

        return null;
    }

    public static function checkPlafond($plafond)
    {
        $idPlafond = Kriteria::where('nama_kriteria', 'Plafond')->first();

        $bobotPlafond = Bobot::where('id_kriteria', $idPlafond->id)->get();

        foreach ($bobotPlafond as $bobot) {
            $poin = $bobot->poin;

            // Manually check the conditions
            if ($bobot->keterangan === '>4.500.000' && $plafond > 4500000) {
                return $poin;
            } elseif ($bobot->keterangan === '3.500.001 – 4.500.000' && $plafond >= 3500000 && $plafond <= 4500000) {
                return $poin;
            } elseif ($bobot->keterangan === '2.500.001 – 3.500.000' && $plafond >= 2500001 && $plafond <= 3500000) {
                return $poin;
            } elseif ($bobot->keterangan === '2.000.001 – 2.500.000' && $plafond >= 2000001 && $plafond <= 2500000) {
                return $poin;
            } elseif ($bobot->keterangan === '<2.000.001' && $plafond < 2000001) {
                return $poin;
            }
        }

        return null;
    }

    public static function checkJw($jw)
    {
        $idJw = Kriteria::where('nama_kriteria', 'Jw')->first();

        $bobotJw = Bobot::where('id_kriteria', $idJw->id)->get();

        foreach ($bobotJw as $bobot) {
            $poin = $bobot->poin;

            // Manually check the conditions
            if ($bobot->keterangan === '>=30' && $jw >= 30) {
                return $poin;
            } elseif ($bobot->keterangan === '21 – 29 ' && $jw >= 21 && $jw <= 29 ) {
                return $poin;
            } elseif ($bobot->keterangan === '16 – 20 ' && $jw >= 16 && $jw <= 20 ) {
                return $poin;
            } elseif ($bobot->keterangan === '11 – 15 ' && $jw >= 11 && $jw <= 15 ) {
                return $poin;
            } elseif ($bobot->keterangan === '<=10' && $jw <= 10) {
                return $poin;
            }
        }

        return null;
    }

    public static function checkAngsuran($angsuran)
    {
        $idAngsuran = Kriteria::where('nama_kriteria', 'Angsuran')->first();

        $bobotAngsuran = Bobot::where('id_kriteria', $idAngsuran->id)->get();

        foreach ($bobotAngsuran as $bobot) {
            $poin = $bobot->poin;

            // Manually check the conditions
            if ($bobot->keterangan === '<=100.000' && $angsuran <= 100000) {
                return $poin;
            } elseif ($bobot->keterangan === '100.001 – 200.000 ' && $angsuran >= 100001 && $angsuran <= 200000 ) {
                return $poin;
            } elseif ($bobot->keterangan === '200.001 – 300.000 ' && $angsuran >= 200001 && $angsuran <= 300000 ) {
                return $poin;
            } elseif ($bobot->keterangan === '300.001 – 400.000 ' && $angsuran >= 300001 && $angsuran <= 400000 ) {
                return $poin;
            } elseif ($bobot->keterangan === '>400.000' && $angsuran > 400000) {
                return $poin;
            }
        }

        return null;
    }

    public static function checkJaminan($jaminan)
    {
        $idJaminan = Kriteria::where('nama_kriteria', 'Jaminan')->first();

        $bobotJaminan = Bobot::where('id_kriteria', $idJaminan->id)->get();

        foreach ($bobotJaminan as $bobot) {
            $poin = $bobot->poin;

            // Manually check the conditions
            if ($bobot->keterangan === '<=2.000.000' && $jaminan <=2000000) {
                return $poin;
            } elseif ($bobot->keterangan === '2.000.001 – 3.000.000 ' && $jaminan >= 2000001 && $jaminan <= 3000000 ) {
                return $poin;
            } elseif ($bobot->keterangan === '3.000.001 – 4.000.000 ' && $jaminan >= 3000001 && $jaminan <= 4000000 ) {
                return $poin;
            } elseif ($bobot->keterangan === '4.000.001 – 5.000.000 ' && $jaminan >= 4000001 && $jaminan <= 5000000 ) {
                return $poin;
            } elseif ($bobot->keterangan === '>5.000.000' && $jaminan > 5000000) {
                return $poin;
            }
        }

        return null;
    }

    
}