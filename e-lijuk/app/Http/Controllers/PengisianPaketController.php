<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengisianPaketController extends Controller
{
    public function index()
    {
        $paket = Paket::get();
        return view('pengisian_paket', ['paket' => $paket]);
    }

    public function input_paket(Request $request)
    {
        // Validasi input
        $validasi = Validator::make($request->all(), [
            'jenis_paket' => 'required|string',
            'deskripsi' => 'required|string',
            'biaya' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return response()->json(['success' => false, 'errors' => $validasi->errors()], 422);
        }

        // Simpan data paket ke dalam database
        $data = $request->only(['jenis_paket', 'deskripsi', 'biaya']);
        
        // Upload dan simpan foto
        $foto = $request->file('foto');
        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        $tujuan_upload = 'data_paket'; // Ubah sesuai dengan folder tujuan Anda
        $foto->move($tujuan_upload, $nama_foto);
        $data['foto'] = $nama_foto;

        Paket::create($data);

        return response()->json(['success' => true]);
    }
}
