<?php

namespace App\Http\Controllers;

use App\Models\Taman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Information_Input_Data_TamanController extends Controller
{
    public function showInfo()
    {
        $taman = Taman::get();
        return view('information_Input_data_taman', ['taman' => $taman]);
    }

    public function input_taman(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_taman' => 'required|string',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withInput()->withErrors($validasi);
        }

        // Simpan data paket ke dalam database
        $data = $request->only(['nama_taman', 'alamat', 'deskripsi']);
        
       // Upload dan simpan foto
       $foto = $request->file('foto');
       $nama_foto = time() . "_" . $foto->getClientOriginalName();
       $tujuan_upload = 'data_taman'; // Ubah sesuai dengan folder tujuan Anda
       $foto->move($tujuan_upload, $nama_foto);
       $data['foto'] = $nama_foto;

        Taman::create($data);

        return response()->json(['success' => true]);
    }
}
