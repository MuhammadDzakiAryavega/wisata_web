<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;

Route::get('/', [WisataController::class, 'index'])->name('home');

Route::get('/list', [WisataController::class, 'list'])->name('list');

Route::get('/wisata/create', [WisataController::class, 'create'])->name('wisata.create');

Route::post('/wisata', [WisataController::class, 'store'])->name('wisata.store');

// (Opsional) Index wisata
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
