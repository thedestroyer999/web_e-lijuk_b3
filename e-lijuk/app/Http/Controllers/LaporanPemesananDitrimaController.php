<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class LaporanPemesananDitrimaController extends Controller
{
    public function index()
    {
        $dataPemesanan = Pemesanan::where('status', 'ditrima')->get();
        $jumlahPesananditrima = $dataPemesanan->count(); // tambahan variabel jumlah pesanan
        return view('laporan_pemesanan_ditrima', compact('dataPemesanan', 'jumlahPesananditrima'));
    }

    public function destroy($id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        $pemesanan->delete();

        return redirect()->back()->with('success', 'Pemesanan berhasil dihapus');
    }
}
