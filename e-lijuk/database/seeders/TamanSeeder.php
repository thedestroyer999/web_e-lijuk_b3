<?php

namespace Database\Seeders;

use App\Models\Taman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Taman::create([
            'nama_taman' => 'taman kartanegara',
            'alamat' => 'jln kartanagara',
            'deskripsi' => 'deskripsi ini',
            'foto' => '',
        ]);
    }
}
