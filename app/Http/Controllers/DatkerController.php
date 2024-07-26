<?php

namespace App\Http\Controllers;

use App\Models\Datker;
use Illuminate\Http\Request;

class DatkerController extends Controller
{
    public function index()
    {
        $kriteriaList = Datker::orderBy('id_kriteria', 'ASC')->get();
        
        return view('datakriteria.datakriteria', compact('kriteriaList'));
    }

    public function create()
    {
        return view('datakriteria.datakriteria_entry');
    }

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required|min:2',
            'bobot' => 'required',
            'poin1' => 'required',
            'poin2' => 'required',
            'poin3' => 'required',
            'poin4' => 'required',
            'poin5' => 'required',
            'sifat' => 'required',
        ]);

        Datker::create([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'poin1' => $request->poin1,
            'poin2' => $request->poin2,
            'poin3' => $request->poin3,
            'poin4' => $request->poin4,
            'poin5' => $request->poin5,
            'sifat' => $request->sifat,
        ]);

        return redirect('/datakriteria')->with('status', 'Data Pemohon berhasil ditambahkan!');
    }
    //edit  database
    public function edit($id_kriteria)
    {
        $kriteriaList = Datker::find($id_kriteria);
        return view('datakriteria.datakriteria_edit', compact('kriteriaList'));
    }

    public function update(Request $request, $id_kriteria)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required|min:2',
            'bobot' => 'required',
            'poin1' => 'required',
            'poin2' => 'required',
            'poin3' => 'required',
            'poin4' => 'required',
            'poin5' => 'required',
            'sifat' => 'required',
        ]);

        $kriteriaList = Datker::find($id_kriteria);

        $kriteriaList->update([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'poin1' => $request->poin1,
            'poin2' => $request->poin2,
            'poin3' => $request->poin3,
            'poin4' => $request->poin4,
            'poin5' => $request->poin5,
            'sifat' => $request->sifat,
        ]);

        return redirect('/datakriteria')->with('status', 'data pemohon berhasil di edit!');
    }

        //delete  database
        public function delete($id_kriteria)
        {
            $kriteriaList = Datker::find($id_kriteria);
            return view('datakriteria.datakriteria_delete', compact('kriteriaList'));
        }
    
        public function destroy($id_kriteria)
        {
            $kriteriaList = datker::find($id_kriteria);
            $kriteriaList->delete();
            return redirect('/datakriteria')->with('status', 'Data berhasil di hapus!');
        }
}
