<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;

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

//Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');

//Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');

//Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');

//Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
