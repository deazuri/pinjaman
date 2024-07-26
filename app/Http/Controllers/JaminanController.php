<?php

namespace App\Http\Controllers;

use App\Models\Jaminan; // Add this use statement for the Jaminan model
use App\Models\Pemohon;
use App\Models\DataKriteria;
use Illuminate\Http\Request;

class JaminanController extends Controller
{
    public function upload()
    {
        $jaminan = Jaminan::get();
        $pemohon = Pemohon::all();
        $kriteria = DataKriteria::all();

        return view('nilai_jaminan.jaminan', compact('jaminan', 'pemohon', 'kriteria'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'id_pemohon' => 'required|exists:pemohons,id',
            'nama_jaminan' => 'required',
            'id_kriteria' => 'required|exists:data_kriterias,id',
        ]);

        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        Jaminan::create([
            'file' => $nama_file,
            'id_pemohon' => $request->id_pemohon,
            'nama_jaminan' => $request->nama_jaminan,
            'id_kriteria' => $request->id_kriteria,
        ]);

        return redirect()->back();
    }
    
    public function edit($id)
{
    $jaminan = Jaminan::find($id);
    $pemohon = Pemohon::all();
    $kriteria = DataKriteria::all();
    return view('nilai_jaminan.jaminan_edit', compact('jaminan', 'pemohon', 'kriteria'));
}

    public function update(Request $request, $id)
    {
       
        $jaminan = Jaminan::find($id);
        $jaminan->id_pemohon = $request->id_pemohon;
        $jaminan->nama_jaminan = $request->nama_jaminan;
        $jaminan->id_kriteria = $request->id_kriteria;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $nama_file);
            $jaminan->file = $nama_file;
        }

        $jaminan->save();

        return redirect('/jaminan');
    }

    public function delete($id)
    {
        $jaminan = Jaminan::find($id);
        $jaminan->delete();

        return redirect()->back();
    }
}
