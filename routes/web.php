<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\isAdmin;

Route::get('/', [WisataController::class, 'index'])->name('home');

Route::get('/form', [WisataController::class, 'form'])->name('form');

Route::get('/wisata/create', [WisataController::class, 'create'])->name('wisata.create');

Route::post('/wisata', [WisataController::class, 'store'])->name('wisata.store');
// (Opsional) Index wisata

Route::get('/list', [WisataController::class, 'list'])->name('wisata.list');

Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');

Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');

Route::put('/wisata/{id}', [WisataController::class, 'update'])->name('wisata.update');

Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');

Route::get('/top-rate', [WisataController::class, 'topRated'])->name('wisata.toprate');

Route::get('/contact', function () { return view('contact');})->name('contact');

// Menangani form ketika disubmit
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', [WisataController::class, 'dashboard']);

Route::get('/dashboard', function () {return view('admin.dashboard');})->middleware('is_admin');

//Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');

//Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');

//Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');

//Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
