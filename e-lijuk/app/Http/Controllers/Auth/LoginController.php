<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class LoginController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $admin = Admin::where('email', $credentials['email'])->first();
        
        if (empty($credentials['email']) || empty($credentials['password'])) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email dan password tidak boleh kosong.']);
        } 
    
        if (strpos($credentials['email'], ' ') !== false) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email tidak boleh mengandung spasi.']);
        } 
    
        if (!$admin) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email tidak ditemukan.']);
        }
        
        if (strlen($credentials['password']) < 4) {
            return redirect()->back()->withInput()->withErrors(['password' => 'Kata sandi harus memiliki minimal 4 karakter.']);
        }
       
        if (strpos($credentials['password'], ' ') !== false) {
            return redirect()->back()->withInput()->withErrors(['password' => 'Kata sandi tidak boleh mengandung spasi.']);
        }    
    
        if (!Hash::check($credentials['password'], $admin->Password)) {
            return redirect()->back()->withInput()->withErrors(['password' => 'Password salah.']);
        }
    
        Auth::login($admin);
        return redirect()->route('dashboard');
    }
    
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
