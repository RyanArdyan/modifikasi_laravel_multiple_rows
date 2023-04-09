<?php

use Illuminate\Support\Facades\Route;
// gunakan HomeController
use App\Http\Controllers\HomeController;

// Route tipe dapatkan, jika user di url awal maka arahkan ke HomeController, ke method index, name nya adalah home.index
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route tipe kirim, jika user di diarahkan ke url /simpan maka arahkan ke HomeController, ke method simpan, name nya adalah home.simpan
Route::post('/simpan', [HomeController::class, 'simpan'])->name('home.simpan');