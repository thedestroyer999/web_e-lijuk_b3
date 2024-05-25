<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taman extends Model
{
    protected $table = 'taman'; // Nama tabel sesuai dengan struktur
    protected $primaryKey = 'id_taman'; // Nama kolom primary key
    public $timestamps = false; // Tidak ada kolom created_at dan updated_at

    // Mass assignable properties
    protected $fillable = [
        'nama_taman', 'alamat', 'deskripsi', 'foto',
    ];
}
