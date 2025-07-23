<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/koleksi', function () {
    return view('koleksi');
});

Route::get('/aktivitas', function () {
    return view('aktivitas');
});
