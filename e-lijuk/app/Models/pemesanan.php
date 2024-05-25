<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan'; // Nama tabel sesuai dengan struktur
    protected $primaryKey = 'id_pemesanan'; // Nama kolom primary key
    public $timestamps = false; // Tidak ada kolom created_at dan updated_at

    // Mass assignable properties
    protected $fillable = [
        'nama_pengguna', 'no_whatsapp', 'jenjang_pendidikan', 'jumlah_peserta', 'tanggal_booking', 'waktu_awal', 'waktu_akhir', 'tanggal_pesan', 'status',
    ];
}
