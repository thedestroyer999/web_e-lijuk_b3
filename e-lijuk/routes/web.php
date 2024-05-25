<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LandingPageController;

Route::get('/landing_page', [LandingPageController::class, 'show']);

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login'])->name('login-proses');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Information_Input_Data_TamanController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

use App\Http\Controllers\InformationController;

Route::get('/information_input_data_taman', 'Information_Input_Data_TamanController@showInfo')->name('information_input_data_taman');
Route::get('/information_input_data_taman', 'App\Http\Controllers\Information_Input_Data_TamanController@showInfo')->name('information_input_data_taman');
Route::post('/input_taman', [Information_Input_Data_TamanController::class, 'input_taman'])->name('prosesinputtaman');

use App\Http\Controllers\UserDataController;

Route::get('/userdata', [UserDataController::class, 'show'])->name('userdata.show');

use App\Http\Controllers\TamanYangTersediaController;

Route::get('/taman_yang_tersedia', [TamanYangTersediaController::class, 'index']);
Route::get('/taman_yang_tersedia', [TamanYangTersediaController::class, 'index'])->name('taman_yang_tersedia');
Route::get('/taman_yang_tersedia/{id_taman}/edit', [TamanYangTersediaController::class, 'edit'])->name('taman.edit');


use App\Http\Controllers\LaporanPemesananController;

Route::get('/laporan_pemesanan', [LaporanPemesananController::class, 'index'])->name('laporan_pemesanan.index');

use App\Http\Controllers\LaporanPemesananDitrimaController;

Route::get('/laporan_pemesanan_ditrima', [LaporanPemesananDitrimaController::class, 'index'])->name('laporan_pemesanan_ditrima.index');

use App\Http\Controllers\PengisianPaketController;

Route::get('/pengisian_paket', [PengisianPaketController::class, 'index'])->name('pengisian_paket.index');
Route::post('/input_paket', [PengisianPaketController::class, 'input_paket'])->name('prosesinputpaket');

use App\Http\Controllers\PaketTersediaController;

Route::get('/paket_tersedia', [PaketTersediaController::class, 'index'])->name('paket_tersedia.index');


Route::delete('/taman/{id_taman}', [TamanYangTersediaController::class, 'destroy'])->name('taman.destroy');
Route::delete('/paket/{id_paket}', [PaketTersediaController::class, 'destroy'])->name('paket.destroy');
Route::delete('/pemesanan/{id_pemesanan}', [LaporanPemesananDitrimaController::class, 'destroy'])->name('pemesanan.destroy');
Route::delete('/usermobile/{id_user}', [UserDataController::class, 'destroy'])->name('user.destroy');
Route::get('paket/{id_paket}/edit', [PaketTersediaController::class, 'edit'])->name('paket.edit');
Route::get('/paket/{id_paket}/edit', 'PaketTersediaController@edit')->name('paket.edit');
Route::put('/paket/{id_paket}', 'PaketTersediaController@update')->name('paket.update');


Route::put('/pemesanan/{id_pemesanan}/trima', [LaporanPemesananController::class, 'terimaPemesanan'])->name('pemesanan.terima');
Route::put('/pemesanan/{id_pemesanan}/tolak', [LaporanPemesananController::class, 'tolakPemesanan'])->name('pemesanan.tolak');
// Route::put('/pemesanan/{id_pemesanan}/terima', 'LaporanPemesananController@terimaPemesanan')->name('pemesanan.terima');
// Route::put('/pemesanan/{id_pemesanan}/tolak', 'LaporanPemesananController@tolakPemesanan')->name('pemesanan.tolak');


use App\Http\Controllers\AdminProfileController;

Route::get('/admin_profil', [AdminProfileController::class, 'showProfile']);

use App\Http\Controllers\LaporanPemesananDitolakController;

Route::get('laporan_pemesanan_ditolak', [LaporanPemesananDitolakController::class, 'index']);
Route::get('laporan_pemesanan_ditolak', [LaporanPemesananDitolakController::class, 'index'])->name('laporan_pemesanan_ditolak');


Route::post('/update-password', [AdminProfileController::class, 'updatePassword'])->name('update.password');

