<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Pemohon;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Pemohon::all();
        return view('data_alternatif.data_alternatif', compact('alternatif'));
    }
    public function create()
    {
        $pemohon = Pemohon::all();
        return view('data_alternatif.data_alternatif_entry', compact('pemohon'));
    }

    //insert data ke database
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'kode' => 'required|min:2',
        //     'id' => 'required',

        // ]);

        Alternatif::create([
            'id' => $request->id,
        ]);

        return redirect('/data_alternatif')->with('status', 'Data Kriteria berhasil ditambahkan!');
    }
}
