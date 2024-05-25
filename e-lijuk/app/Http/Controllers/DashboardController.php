<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total pendapatan dari pemesanan yang diterima
        $totalPendapatan = Pemesanan::where('status', 'ditrima')
            ->join('paket', 'pemesanan.id_paket', '=', 'paket.id_paket')
            ->sum('paket.biaya');

        // Menghitung jumlah pesanan dengan status "diproses"
        $jumlahPesananDiproses = Pemesanan::where('status', 'diproses')->count();

        // Menghitung jumlah pesanan yang ditolak
        $jumlahPesananDitolak = Pemesanan::where('status', 'ditolak')->count();

        // Menghitung jumlah pesanan yang diterima
        $jumlahPesananDiterima = Pemesanan::where('status', 'ditrima')->count();

        // Mengirim nilai total pendapatan, jumlah pesanan diproses, jumlah pesanan ditolak, dan jumlah pesanan diterima ke view 'dashboard'
        return view('dashboard', [
            'totalPendapatan' => $totalPendapatan,
            'jumlahPesananDiproses' => $jumlahPesananDiproses,
            'jumlahPesananDitolak' => $jumlahPesananDitolak,
            'jumlahPesananDiterima' => $jumlahPesananDiterima
        ]);
    }
}
