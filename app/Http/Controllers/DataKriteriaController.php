<?php

namespace App\Http\Controllers;

use App\Imports\DataKriteriaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Kriteria;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use App\Models\DataKriteria;
use App\Models\Matriks;
use App\Service\KriteriaService;
use Illuminate\Support\Facades\DB;

class DataKriteriaController extends Controller
{
    
    public function index()
    {
        $kriteria = DataKriteria::all();
        return view('data_kriteria.data_kriteria', compact('kriteria'));
    }
    public function create()
    {
        $pemohon = Pemohon::all();
        return view('data_kriteria.data_kriteria_entry', compact('pemohon'));
    }

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pemohon' => 'required',
            'pendapatan' => 'required',
            'plafond' => 'required',
            'jw' => 'required',
            'angsuran' => 'required',
            'jaminan' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            // check if perumahan already exists
            $idPemohon = DataKriteria::where('id_pemohon', $request->id_pemohon)->first();

            if ($idPemohon) {
                return redirect('/data_kriteria')->with('error', 'Data Kriteria sudah ada!');
            }
            $dataKriteria = DataKriteria::create([
                'id_pemohon' => $request->id_pemohon,
                'pendapatan' => $request->pendapatan,
                'plafond' => $request->plafond,
                'jw' => $request->jw,
                'angsuran' => $request->angsuran,
                'jaminan' => $request->jaminan,
                ]);

            $idPendapatan = Kriteria::where('nama_kriteria', 'Pendapatan')->first();
            $idPlafond = Kriteria::where('nama_kriteria', 'Plafond')->first();
            $idJw= Kriteria::where('nama_kriteria', 'Jw')->first();
            $idAngsuran = Kriteria::where('nama_kriteria', 'Angsuran')->first();
            $idJaminan = Kriteria::where('nama_kriteria', 'Jaminan')->first();
            
            $pendapatan = KriteriaService::checkPendapatan($request->pendapatan);
            $plafond = KriteriaService::checkPlafond($request->plafond);
            $jw = KriteriaService::checkJw($request->jw);
            $angsuran = KriteriaService::checkAngsuran($request->angsuran);
            $jaminan = KriteriaService::checkJaminan($request->jaminan);
           
            Matriks::create([
                'id_kriteria' => $dataKriteria->id,
                'id_pemohon' => $request->id_pemohon,
                'id_bobot_kriteria' => $idPendapatan->id,
                'nilai' => $pendapatan,
            ]);

            Matriks::create([
                'id_kriteria' => $dataKriteria->id,
                'id_pemohon' => $request->id_pemohon,
                'id_bobot_kriteria' => $idPlafond->id,
                'nilai' => $plafond,
            ]);

            Matriks::create([
                'id_kriteria' => $dataKriteria->id,
                'id_pemohon' => $request->id_pemohon,
                'id_bobot_kriteria' => $idJw->id,
                'nilai' => $jw,
            ]);

            Matriks::create([
                'id_kriteria' => $dataKriteria->id,
                'id_pemohon' => $request->id_pemohon,
                'id_bobot_kriteria' => $idAngsuran->id,
                'nilai' => $angsuran,
            ]);

            Matriks::create([
                'id_kriteria' => $dataKriteria->id,
                'id_pemohon' => $request->id_pemohon,
                'id_bobot_kriteria' => $idJaminan->id,
                'nilai' => $jaminan,
            ]);

        });

        return redirect('/data_kriteria')->with('status', 'Data Kriteria berhasil ditambahkan!');
    }
    //edit  database
    public function edit($id_kriteria)
    {
        $kriteria = DataKriteria::find($id_kriteria);
        $pemohon = Pemohon::all();
        return view('data_kriteria.data_kriteria_edit', compact('kriteria', 'pemohon'));
    }

    public function update(Request $request, $id_kriteria)
    {
        $this->validate($request, [
            'pendapatan' => 'required',
            'plafond' => 'required',
            'jw' => 'required',
            'angsuran' => 'required',
            'jaminan' => 'required',
        ]);

            $kriteria = DataKriteria::find($id_kriteria);

            DB::transaction(function () use ($request, $kriteria) {
                if ($kriteria->id_pemohon != $request->id_pemohon) {
                    $idPemohon = DataKriteria::where('id_pemohon', $request->id_pemohon)->first();
                    if ($idPemohon) {
                        return redirect('/data_kriteria')->with('error', 'Data Kriteria sudah ada!');
                    }
                }
                $kriteria->update([
                    'id_pemohon' => $request->id_pemohon,
                    'pendapatan' => $request->pendapatan,
                    'plafond' => $request->plafond,
                    'jw' => $request->jw,
                    'angsuran' => $request->angsuran,
                    'jaminan' => $request->jaminan,
                ]);
    
                $idPendapatan = Kriteria::where('nama_kriteria', 'Pendapatan')->first();
                $idPlafond = Kriteria::where('nama_kriteria', 'Plafond')->first();
                $idJw= Kriteria::where('nama_kriteria', 'Jw')->first();
                $idAngsuran = Kriteria::where('nama_kriteria', 'Angsuran')->first();
                $idJaminan = Kriteria::where('nama_kriteria', 'Jaminan')->first();
                
                $pendapatan = KriteriaService::checkPendapatan($request->pendapatan);
                $plafond = KriteriaService::checkPlafond($request->plafond);
                $jw = KriteriaService::checkJw($request->jw);
                $angsuran = KriteriaService::checkAngsuran($request->angsuran);
                $jaminan = KriteriaService::checkJaminan($request->jaminan);
    
                $pendapatanMatriks = Matriks::where('id_kriteria', $kriteria->id)->where('id_bobot_kriteria', $idPendapatan->id)->first();
    
                $plafondMatriks = Matriks::where('id_kriteria', $kriteria->id)->where('id_bobot_kriteria', $idPlafond->id)->first();
    
                $jwMatriks = Matriks::where('id_kriteria', $kriteria->id)->where('id_bobot_kriteria', $idJw->id)->first();
    
                $angsuranMatriks = Matriks::where('id_kriteria', $kriteria->id)->where('id_bobot_kriteria', $idAngsuran->id)->first();
    
                $jaminanMatriks = Matriks::where('id_kriteria', $kriteria->id)->where('id_bobot_kriteria', $idJaminan->id)->first();
  
    
                $pendapatanMatriks->update([
                    'id_pemohon' => $request->id_pemohon,
                    'nilai' => $pendapatan,
                ]);
    
                $plafondMatriks->update([
                    'id_pemohon' => $request->id_pemohon,
                    'nilai' => $plafond,
                ]);
    
                $jwMatriks->update([
                    'id_pemohon' => $request->id_pemohon,
                    'nilai' => $jw,
                ]);
    
                $angsuranMatriks->update([
                    'id_pemohon' => $request->id_pemohon,
                    'nilai' => $angsuran,
                ]);
    
                $jaminanMatriks->update([
                    'id_pemohon' => $request->id_pemohon,
                    'nilai' => $jaminan,
                ]);
            });

        return redirect('/data_kriteria')->with('status', 'Data Kriteria berhasil di edit!');
    }

            //delete  database
    public function delete($id_kriteria)
    {
        $kriteria = DataKriteria::find($id_kriteria);
        return view('data_kriteria.data_kriteria_delete', compact('kriteria'));
    }

    public function destroy($id_kriteria)
    {
        $kriteria = DataKriteria::find($id_kriteria);
        $matriks = Matriks::where('id_pemohon', $kriteria->id_pemohon)->get();
        foreach ($matriks as $data) {
            $data->delete();
        }
        $kriteria->delete();
        return redirect('/data_kriteria')->with('status', 'Data berhasil di hapus!');
    }

    public function proses(Request $request)
    {
        Matriks::truncate();

        $dataKriteria = DataKriteria::all();
        $idPendapatan = Kriteria::where('nama_kriteria', 'Pendapatan')->first();
        $idPlafond = Kriteria::where('nama_kriteria', 'Plafond')->first();
        $idJw= Kriteria::where('nama_kriteria', 'Jw')->first();
        $idAngsuran = Kriteria::where('nama_kriteria', 'Angsuran')->first();
        $idJaminan = Kriteria::where('nama_kriteria', 'Jaminan')->first();

        foreach ($dataKriteria as $data) {
            $pendapatan = KriteriaService::checkPendapatan($data->pendapatan);
            $plafond = KriteriaService::checkPlafond($data->plafond);
            $jw = KriteriaService::checkJw($data->jw);
            $angsuran = KriteriaService::checkAngsuran($data->angsuran);
            $jaminan = KriteriaService::checkJaminan($data->jaminan);

            Matriks::create([
                'id_kriteria' => $data->id,
                'id_pemohon' => $data->id_pemohon,
                'id_bobot_kriteria' => $idPendapatan->id,
                'nilai' => $pendapatan,
            ]);

            Matriks::create([
                'id_kriteria' => $data->id,
                'id_pemohon' => $data->id_pemohon,
                'id_bobot_kriteria' => $idPlafond->id,
                'nilai' => $plafond,
            ]);

            Matriks::create([
                'id_kriteria' => $data->id,
                'id_pemohon' => $data->id_pemohon,
                'id_bobot_kriteria' => $idJw->id,
                'nilai' => $jw,
            ]);

            Matriks::create([
                'id_kriteria' => $data->id,
                'id_pemohon' => $data->id_pemohon,
                'id_bobot_kriteria' => $idAngsuran->id,
                'nilai' => $angsuran,
            ]);

            Matriks::create([
                'id_kriteria' => $data->id,
                'id_pemohon' => $data->id_pemohon,
                'id_bobot_kriteria' => $idJaminan->id,
                'nilai' => $jaminan,
            ]);
        }

        return redirect('/matriks_ternormalisasi')->with('status', 'Data Kriteria berhasil ditambahkan!');
    }

    public function importExcel(Request $request)
{
    $this->validate($request, [
        'file' => 'required|mimes:xlsx,xls,csv|max:2048',
    ]);

    $file = $request->file('file');

    try {
        // Use the DataKriteriaImport class to handle the import
        Excel::import(new DataKriteriaImport, $file);

        return redirect('/data_kriteria')->with('status', 'Data imported successfully!');
    } catch (\Exception $e) {
        return redirect('/data_kriteria')->with('error', 'Error importing data: ' . $e->getMessage());
    }
}

   }
