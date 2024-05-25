<?php
namespace App\Http\Controllers;

use App\Models\Pemesanan;

class LaporanPemesananDitolakController extends Controller
{
    public function index()
    {
        // Mendapatkan data pemesanan yang ditolak
        $dataPemesanan = Pemesanan::where('status', 'ditolak')->get();

        // Menghitung jumlah pesanan yang ditolak
        $jumlahPesananditolak = $dataPemesanan->count();

        // Mengirimkan data pemesanan dan jumlah pesanan yang ditolak ke tampilan
        return view('laporan_pemesanan_ditolak')->with([
            'dataPemesanan' => $dataPemesanan,
            'jumlahPesananditolak' => $jumlahPesananditolak,
        ]);
    }

    public function destroy($id_pemesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pemesanan);
        $pemesanan->delete();

        return redirect()->back()->with('success', 'Pemesanan berhasil dihapus');
    }
}
