<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\QueryException;

class AdminProfileController extends Controller
{

    public function updatePassword(Request $request)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4|different:current_password',
            'renew_password' => 'required|same:new_password',
        ]);

        // Mengambil data admin pertama yang ada dalam tabel
        $admin = Admin::first();

        // Periksa apakah ada data admin atau tidak
        if ($admin) {
            try {

                if (Hash::check($request->current_password, $admin->Password)) {
                    // Enkripsi kata sandi baru sebelum disimpan
                    $admin->password = Hash::make($request->new_password);
                    $admin->save();

                    // Redirect dengan pesan sukses
                    return redirect()->back()->with('success', 'Kata sandi berhasil diperbarui.');
                } else {
                    // Redirect dengan pesan error jika kata sandi saat ini tidak cocok
                    return redirect()->back()->with('error', 'Kata sandi lama tidak sesuai.');
                }
            } catch (QueryException $e) {
                // Redirect dengan pesan error jika terjadi error saat update data
                return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui kata sandi: ' . $e->getMessage());
            }
        } else {
            // Redirect dengan pesan error jika tidak ada data admin
            return redirect()->back()->with('error', 'Tidak ada data admin yang ditemukan.');
        }
    }

    public function showProfile()
    {
        // Mengambil data admin pertama yang ada dalam tabel
        $admin = Admin::first();

        // Periksa apakah ada data admin atau tidak
        if ($admin) {
            // Jika ada, ambil nama lengkap dan email-nya
            $email = $admin->email;
        } else {
            // Jika tidak ada data admin, set nama lengkap dan email menjadi null atau pesan yang sesuai
            $nama_lengkap = null; // Atau pesan yang sesuai jika Anda menginginkannya
            $email = null; // Atau pesan yang sesuai jika Anda menginginkannya
        }

        // Kirimkan data nama lengkap dan email ke tampilan
        return view('profil_admin', [
            'email' => $email,
        ]);
    }
}
