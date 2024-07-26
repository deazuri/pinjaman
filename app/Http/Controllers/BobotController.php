<?php

namespace App\Http\Controllers;
use App\Models\Bobot;
use App\Models\Kriteria;
use App\Models\DataKriteria;

use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = Bobot::all();
        return view('bobot.bobot', compact('bobot'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('bobot.bobot_entry', compact('kriteria'));
    }

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kriteria' => 'required',
            'poin' => 'required',
            'keterangan' => 'required',
        ]);

        Bobot::create([
            'id_kriteria'=> $request->id_kriteria,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/bobot')->with('status', 'Data Pemohon berhasil ditambahkan!');
    }

     //edit  database
     public function edit($id_kriteria)
     {
        $bobot = Bobot::find($id_kriteria);
        $kriteria = Kriteria::all();
        return view('bobot.bobot_edit', compact('kriteria', 'bobot'));
     }
 
     public function update(Request $request, $id_kriteria)
     {
        $this->validate($request, [
            'id_kriteria' => 'required',
            'poin' => 'required',
            'keterangan' => 'required',
        ]);
 
        $kriteria = Bobot::find($id_kriteria);
 
        $kriteria->update([
            'id_kriteria'=> $request->id_kriteria,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
         ]);
 
         return redirect('/bobot')->with('status', 'data pemohon berhasil di edit!');
     }
 
         //delete  database
         public function delete($id_kriteria)
         {
            $bobot = Bobot::find($id_kriteria);
             return view('bobot.bobot_delete', compact('bobot'));
         }
     
         public function destroy($id_kriteria)
         {
            $kriteria = Bobot::find($id_kriteria);
            $kriteria->delete();
             return redirect('/bobot')->with('status', 'Data berhasil di hapus!');
         }
}
