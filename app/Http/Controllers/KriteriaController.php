<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();

        return view('kriteria.kriteria', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.kriteria_entry');
    }

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'sifat' => 'required',
        ]);

        Kriteria::create([
            'id_kriteria' => $request->id_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'sifat' => $request->sifat,
        ]);

        return redirect('/kriteria')->with('status', 'Data Pemohon berhasil ditambahkan!');
    }
    //edit  database
    public function edit($id_kriteria)
    {
        $kriteria = Kriteria::find($id_kriteria);
        return view('kriteria.kriteria_edit', compact('kriteria'));
    }

    public function update(Request $request, $id_kriteria)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'sifat' => 'required',
        ]);

        $kriteria = Kriteria::find($id_kriteria);

        $kriteria->update([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'sifat' => $request->sifat,
        ]);

        return redirect('/kriteria')->with('status', 'data pemohon berhasil di edit!');
    }

        //delete  database
        public function delete($id_kriteria)
        {
            $kriteria = Kriteria::find($id_kriteria);
            return view('kriteria.kriteria_delete', compact('kriteria'));
        }
    
        public function destroy($id_kriteria)
        {
            $kriteria = Kriteria::find($id_kriteria);
            $kriteria->delete();
            return redirect('/kriteria')->with('status', 'Data berhasil di hapus!');
        }
}
