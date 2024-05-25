<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'user',
            'email' => 'user1@gmail.com',
            'kata_sandi' => Hash::make('123456'),
            'nama_pengguna' => 'user1',
            'foto' => 'foto',
            'no_hp' => '1234567890123',
        ]);
    }
}
