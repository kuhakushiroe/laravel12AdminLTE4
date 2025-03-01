<?php

use App\Livewire\Home\Home;
use App\Livewire\Karyawan\Karyawan;
use App\Livewire\Mcu\Mcu;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', Home::class)->name('home');
    Route::get('users', Users::class)->name('users');
    Route::get('karyawan', Karyawan::class)->name('karyawan');
    Route::get('mcu', Mcu::class)->name('mcu');
    Route::get('/table', function () {
        return view('layouts.try.table');
    });
    Route::get('/chart', function () {
        return view('layouts.try.chart');
    });
    Route::get('/proses', function () {
        return view('layouts.try.proses');
    });

    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', function () {
        return view('auth.login');
    });
});
Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
]);
