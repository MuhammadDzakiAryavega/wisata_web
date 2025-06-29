<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin; 

/*ollers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Middl
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [WisataController::class, 'index'])->name('home');
Route::get('/form', [WisataController::class, 'form'])->name('form');
Route::get('/top-rate', [WisataController::class, 'topRated'])->name('wisata.toprate');

Route::get('/wisata/create', [WisataController::class, 'create'])->name('wisata.create');
Route::post('/wisata', [WisataController::class, 'store'])->name('wisata.store');
Route::get('/list', [WisataController::class, 'list'])->name('wisata.list');
Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
Route::put('/wisata/{id}', [WisataController::class, 'update'])->name('wisata.update');
Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');

/*
|--------------------------------------------------------------------------
| Kontak
|--------------------------------------------------------------------------
*/
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/list_contact', [ContactController::class, 'index'])->name('contact.index');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Manual)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

/*
|--------------------------------------------------------------------------
| Email Verification Routes
|--------------------------------------------------------------------------
*/

// Menampilkan halaman permintaan verifikasi
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Memproses link verifikasi dari email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Kirim ulang link verifikasi
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi baru sudah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| Dashboard (Admin Only + Email Verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', IsAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
