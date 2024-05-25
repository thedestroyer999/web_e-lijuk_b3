<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function show()
    {
        $dataUser = User::get();


        return view('userdata',compact('dataUser'));
    }

    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }

}
