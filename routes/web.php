<?php

use App\Http\Controllers\AhpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BobotKriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PeriodePenilaianController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('karyawan', KaryawanController::class);
    Route::get('/ahp/perbandingan', [AhpController::class, 'index'])->name('ahp.index');
    Route::post('/ahp/perbandingan', [AhpController::class, 'store'])->name('ahp.store');

    Route::get('/bobot-kriteria', [BobotKriteriaController::class, 'index'])->name('bobot.index');
    Route::post('/bobot-kriteria/store', [BobotKriteriaController::class, 'store'])->name('bobot.store');
    Route::post('/bobot-kriteria/update/{id}', [BobotKriteriaController::class, 'update'])->name('bobot.update');

    Route::resource('kriteria', KriteriaController::class);
    Route::resource('periode-penilaian', PeriodePenilaianController::class);
    Route::get('/penilaian/{periode_id}', [PenilaianController::class, 'formInput'])
    ->name('penilaian.form');
    Route::post('/penilaian/proses/{periode_id}', [PenilaianController::class, 'proses'])->name('penilaian.proses');
    Route::get('/penilaian/hasil/{periode_id}', [PenilaianController::class, 'hasil'])->name('penilaian.hasil');
    Route::get('/laporan/penilaian/{periode_id}/pdf', [PenilaianController::class,'penilaianPdf'])
    ->name('laporan.penilaian.pdf');

});
