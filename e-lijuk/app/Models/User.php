<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user'; // Nama tabel sesuai dengan struktur
    protected $primaryKey = 'id_user'; // Nama kolom primary key
    public $timestamps = false; // Tidak ada kolom created_at dan updated_at

    // Mass assignable properties
    protected $fillable = [
        'role', 'email', 'kata_sandi', 'nama_pengguna', 'foto', 'no_hp',
    ];
}
