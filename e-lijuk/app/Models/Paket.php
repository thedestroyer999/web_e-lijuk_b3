<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket'; // Nama tabel sesuai dengan struktur
    protected $primaryKey = 'id_paket'; // Nama kolom primary key
    public $timestamps = false; // Tidak ada kolom created_at dan updated_at

    // Mass assignable properties
    protected $fillable = [
        'jenis_paket', 'deskripsi', 'biaya', 'foto',
    ];
}
