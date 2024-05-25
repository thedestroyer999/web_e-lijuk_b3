<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class LaporanPemesananController extends Controller
{
    public function index()
    {
        $dataPemesanan = Pemesanan::where('status', 'diproses')->get();

        return view('laporan_pemesanan', compact('dataPemesanan'));
    }

    public function terimaPemesanan($id_pemesanan)
{
    $pemesanan = Pemesanan::findOrFail($id_pemesanan);
    $pemesanan->status = 'ditrima'; // Ubah status menjadi diterima
    $pemesanan->save();

    return redirect()->back()->with('success', 'Pemesanan diterima.');
}

public function tolakPemesanan($id_pemesanan)
{
    $pemesanan = Pemesanan::findOrFail($id_pemesanan);
    $pemesanan->status = 'ditolak'; // Ubah status menjadi ditolak
    $pemesanan->save();

    return redirect()->back()->with('success', 'Pemesanan ditolak.');
}

}
