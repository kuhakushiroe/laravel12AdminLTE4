<?php

use App\Http\Controllers\ExportKaryawans;
use App\Livewire\Departments\Departments;
use App\Livewire\Home\Home;
use App\Livewire\Karyawan\Karyawan;
use App\Livewire\Mcu\Mcu;
use App\Livewire\Page\Notfound;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', Home::class)->name('home');
    Route::get('karyawan', Karyawan::class)->name('karyawan');
    Route::get('mcu', Mcu::class)->name('mcu');
    Route::group(['middleware' => ['role:superadmin']], function () {
        //Route::get('export-karyawans', [Karyawan::class, 'export'])->name('export-karyawans');
        Route::get('users', Users::class)->name('users');
        Route::get('departments', Departments::class)->name('departments');
        Route::get('/table', function () {
            return view('layouts.try.table');
        })->name('table');;

        Route::get('/chart', function () {
            return view('layouts.try.chart');
        })->name('chart');
        Route::get('/proses', function () {
            return view('layouts.try.proses');
        })->name('proses');
    });


    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::get('/notfound/{page}', Notfound::class);
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
