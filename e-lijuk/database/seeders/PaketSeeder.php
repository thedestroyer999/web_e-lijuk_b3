<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paket::create([
            'jenis_paket' => 'bunga',
            'deskripsi' => 'bunga kamboja',
            'biaya' => '100.000',
            'foto' => '',
        ]);
    }
}
