<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemesanan::create([
            'id_paket' => '11',
            'nama_pengguna' => 'kurniawati',
            'no_whatsapp' => '08123456789',
            'jenjang_pendidikan' => 'SMA',
            'jumlah_peserta' => 5,
            'tanggal_booking' => '2024-04-20',
            'waktu_awal' => '08:00:00',
            'waktu_akhir' => '10:00:00',
            'tanggal_pesan' => now(),
            'status' => 'diproses',
        ]);
    }
}
