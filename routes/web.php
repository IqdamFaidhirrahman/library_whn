<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/koleksi', function () {
    return view('koleksi');
});

Route::get('/aktivitas', function () {
    return view('aktivitas');
});

// use App\Http\Controllers\KoleksiController;
// Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');

