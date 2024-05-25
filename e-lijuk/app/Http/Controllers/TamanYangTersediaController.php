<?php

namespace App\Http\Controllers;

use App\Models\Taman;
use Illuminate\Http\Request;

class TamanYangTersediaController extends Controller
{
    public function index()
    {
        $dataTaman = Taman::get();


        return view('taman_yang_tersedia', compact('dataTaman'));
    }
    public function destroy($id_taman)
    {
        $taman = Taman::findOrFail($id_taman);
        $taman->delete();

        return redirect()->back()->with('success', 'Taman berhasil dihapus');
    }
}
