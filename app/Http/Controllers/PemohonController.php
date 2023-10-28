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
        return view('data pemohon.data pemohon', compact('data pemohon'));
    }
    public function create()
    {
        return view('data pemohon.data_pemohon_entry');
    }

    //insert data ke database
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|min:2',
            'nama_mitra' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ]);

        Pemohon::create([
            'kode' => $request->kode_bahan,
            'nama_mitra' => $request->nama_bahan,
            'usia' => $request->kategori,
            'alamat' => $request->jumlah,
        ]);

        return redirect('/data_pemohon')->with('status', 'Data Pemohon berhasil ditambahkan!');
    }
    //edit  database
//     public function edit($id_bahan)
//     {
//         $pemohon = Pemohon::find($id_bahan);
//         return view('pemohon.pemohon-edit', compact('pemohon'));
//     }

    //     public function update(Request $request, $id_bahan)
//     {
//         $this->validate($request, [
//             'kode_bahan' => 'required|min:2',
//             'nama_bahan' => 'required',
//             'kategori' => 'required',
//             'jumlah' => 'required',
//             'harga' => 'required',
//         ]);

    //         $inventory = Inventory::find($id_bahan);

    //         $inventory->update([
//             'kode_bahan' => $request->kode_bahan,
//             'nama_bahan' => $request->nama_bahan,
//             'kategori' => $request->kategori,
//             'jumlah' => $request->jumlah,
//             'harga' => $request->harga,
//         ]);

    //         return redirect('/inventory')->with('status', 'Inventory berhasil di edit!');
//     }
//     //delete sementara
//     public function trash()
//     {
//         $inventory = Inventory::onlyTrashed()->get();
//         return view('inventory.inventory-trash', compact('inventory'));
//     }
//     public function restore($id_bahan = null)
//     {
//         if ($id_bahan != null) {
//             $id_bahan = Inventory::onlyTrashed()
//                 ->where('id_bahan', $id_bahan)
//                 ->restore();
//         } else {
//             $id_bahan = Inventory::onlyTrashed()->restore();
//         }
//         return redirect('/inventory/trash')->with('status', 'Inventory berhasil di restore!');
//     }
//     //delete  database

    //     public function delete($id_bahan)
//     {
//         $inventory = Inventory::find($id_bahan);
//         return view('inventory.inventory-delete', compact('inventory'));
//     }

    //     public function destroy($id_bahan)
//     {
//         $inventory = Inventory::find($id_bahan);
//         $inventory->delete();
//         return redirect('/inventory')->with('status', 'Inventory berhasil di hapus!');
//     }
//     //delete all
//     public function deleteall($id_bahan = null)
//     {
//         if ($id_bahan != null) {
//             $id_bahan = Inventory::onlyTrashed()
//                 ->where('id_bahan', $id_bahan)
//                 ->forceDelete();
//         } else {
//             $id_bahan = Inventory::onlyTrashed()->forceDelete();
//         }
//         return redirect('/inventory/trash')->with('status', 'Inventory berhasil di hapus permanen!');
//     }
//     //cetak
//     public function cetak()
//     {
//         $inventory = Inventory::all();
//         // return view ('dosen.cetak-pdf',compact('dosen'));
//         $pdf = PDF::loadview('inventory.cetak', ['inventory' => $inventory])->setOptions(['defaultFont' => 'sans-serif']);
//         return $pdf->download('Inventory.pdf');
//     }
}
