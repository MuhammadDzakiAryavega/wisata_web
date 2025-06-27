<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;

// Halaman utama
Route::get('/', [WisataController::class, 'index'])->name('home');

// Form input wisata
Route::get('/form', [WisataController::class, 'form'])->name('form');

// Buat wisata
Route::get('/wisata/create', [WisataController::class, 'create'])->name('wisata.create');
Route::post('/wisata', [WisataController::class, 'store'])->name('wisata.store');

// Daftar wisata (opsional)
Route::get('/list', [WisataController::class, 'list'])->name('wisata.list');

// Detail, edit, update, delete wisata
Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
Route::put('/wisata/{id}', [WisataController::class, 'update'])->name('wisata.update');
Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');

// Halaman wisata top rated
Route::get('/top-rate', [WisataController::class, 'topRated'])->name('wisata.toprate');

// Halaman contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Proses form contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Dashboard (general)
Route::get('/dashboard', [WisataController::class, 'dashboard']);

// Dashboard khusus admin (middleware)
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Duplikat login & logout (tetap dipertahankan)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Menampilkan semua pesan (list_contact.blade.php)
Route::get('/list_contact', [ContactController::class, 'index'])->name('contact.index');

// Menghapus pesan
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

// Komentar rute alternatif (tidak aktif, hanya referensi)
// Route::get('/', function () { return view('user.home'); })->middleware('is_user');
// Route::get('/dashboard', function () { return view('admin.dashboard'); })->middleware('is_admin');
// Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
// Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
// Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');
// Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
