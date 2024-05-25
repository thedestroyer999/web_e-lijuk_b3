<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketTersediaController extends Controller
{
    public function index()
    {
        $dataPaket = Paket::get();

        return view('paket_tersedia', compact('dataPaket'));
    }
    public function update(Request $request, $id_paket)
{
    // Validasi input jika diperlukan

    $paket = Paket::findOrFail($id_paket);
    $paket->jenis_paket = $request->jenis_paket;
    $paket->deskripsi = $request->deskripsi;
    $paket->biaya = $request->biaya;

    // Simpan perubahan ke database
    $paket->save();

    return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui');
}


    public function destroy($id_paket)
    {
        $paket = Paket::findOrFail($id_paket);
        $paket->delete();

        return redirect()->back()->with('success', 'Paket berhasil dihapus');
    }

    public function edit($id_paket)
    {
        $paket = Paket::findOrFail($id_paket);

        return view('edit_paket', compact('paket'));
    }
}
