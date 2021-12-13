<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pages;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Routes untuk Login / Register
Route::get('/login', [Login::class, 'index']);
Route::post('custom-login', [Login::class, 'customLogin'])->name('login.custom');
Route::get('registration', [Login::class, 'registration'])->name('register-user');
Route::post('custom-registration', [Login::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [Login::class, 'signOut'])->name('signout');

// Routes untuk sidebar doang
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth');

// Routes untuk admin
Route::get('/admin/beranda', [Admin::class, 'beranda']);

// Routes untuk admin [berita]
Route::get('/admin/berita', [Admin::class, 'lihat_berita']);
Route::get('/admin/berita/tambah', function () {
    return view('admin.tambah_berita', ['kategori' => DB::table('kategori')->get()]);
});
Route::get('/admin/berita/ubah/{id}', [Admin::class, 'edit_berita']);
Route::get('/admin/berita/hapus/{id}', [Admin::class, 'delete_berita']);
Route::post('/admin/berita/simpan', [Admin::class, 'simpan_berita']);

// Routes untuk admin [kategori]
Route::get('/admin/kategori', [Admin::class, 'lihat_kategori']);
Route::get('/admin/kategori/tambah', function () {
    return view('admin.tambah_kategori');
});
Route::get('/admin/kategori/ubah/{id}', [Admin::class, 'edit_kategori']);
Route::get('/admin/kategori/hapus/{id}', [Admin::class, 'delete_kategori']);
Route::post('/admin/kategori/simpan', [Admin::class, 'simpan_kategori']);

// Routes untuk guest
Route::get('/', [Pages::class, 'home']);
Route::get('/kontak', [Pages::class, 'kontak']);
Route::get('/artikel/{id}', [Pages::class, 'artikel']);
Route::get('/{id}', [Pages::class, 'home']);
