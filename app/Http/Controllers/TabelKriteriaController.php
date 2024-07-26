<?php

namespace App\Http\Controllers;

use App\Models\Tabel_Kriteria;
use Illuminate\Http\Request;

class TabelKriteriaController extends Controller
{
    //
    public function index()
    {
        $tabel = Tabel_Kriteria::all();
        return view('data_tabel_kriteria.data_tabel_kriteria', compact('tabel'));
    }
    public function create()
    {
        return view('data_tabel_kriteria.data_tabel_kriteria_entry');
    }

     //insert data ke database
     public function store(Request $request)
     {
         $this->validate($request, [
             'kode_kr' => 'required|min:2',
             'kriteria' => 'required',
             'keterangan' => 'required',
         ]);
 
         Tabel_Kriteria::create([
             'kode_kr' => $request->kode_kr,
             'kriteria' => $request->kriteria,
             'keterangan' => $request->keterangan,
         ]);
 
         return redirect('/data_tabel_kriteria')->with('status', 'Data Tabel Kriteria berhasil ditambahkan!');
     }

     //edit  database
    public function edit($id)
    {
        $tabel = Tabel_Kriteria::find($id);
        return view('data_tabel_kriteria.data_tabel_kriteria_edit', compact('tabel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_kr' => 'required|min:2',
            'kriteria' => 'required',
            'keterangan' => 'required',
        ]);

        $tabel = Tabel_Kriteria::find($id);

        $tabel->update([
            'kode_kr' => $request->kode_kr,
            'kriteria' => $request->kriteria,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/data_tabel_kriteria')->with('status', 'Tabel berhasil di edit!');
    }

     //delete  database
     public function delete($id)
     {
         $tabel = Tabel_Kriteria::find($id);
         return view('data_tabel_kriteria.data_tabel_kriteria_delete', compact('tabel'));
     }
 
     public function destroy($id)
     {
         $tabel = Tabel_Kriteria::find($id);
         $tabel->delete();
         return redirect('/data_tabel_kriteria')->with('status', 'Data berhasil di hapus!');
     }
}
