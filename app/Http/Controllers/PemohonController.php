<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;

use PDF;

class PemohonController extends Controller
{
    //
    public function index()
    {
        $pemohon = Pemohon::all();
        return view('data_pemohon.data_pemohon', compact('pemohon'));
    }
    public function create()
    {
        return view('data_pemohon.data_pemohon_entry');
    }

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pemohon' => 'required|min:2',
            'usia' => 'required',
            'alamat' => 'required',
        ]);

        Pemohon::create([
            'nama_pemohon' => $request->nama_pemohon,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
        ]);

        return redirect('/data_pemohon')->with('status', 'Data Pemohon berhasil ditambahkan!');
    }

    //edit  database
    public function edit($id)
    {
        $pemohon = Pemohon::find($id);
        return view('data_pemohon.data_pemohon_edit', compact('pemohon'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'kode' => 'required|min:2',
            'nama_pemohon' => 'required|min:2',
            'usia' => 'required',
            'alamat' => 'required',
        ]);

        $pemohon = Pemohon::find($id);

        $pemohon->update([
            // 'kode' => $request->kode,
            'nama_pemohon' => $request->nama_pemohon,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
        ]);

        return redirect('/data_pemohon')->with('status', 'data pemohon berhasil di edit!');
    }

        //delete  database
        public function delete($id)
        {
            $pemohon = Pemohon::find($id);
            return view('data_pemohon.data_pemohon_delete', compact('pemohon'));
        }
    
        public function destroy($id)
        {
            $pemohon = Pemohon::find($id);
            $pemohon->delete();
            return redirect('/data_pemohon')->with('status', 'Data berhasil di hapus!');
        }
   
}
