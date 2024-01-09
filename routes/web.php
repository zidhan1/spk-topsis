<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NilaiImport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'view']);

    Route::get('siswa', [SiswaController::class, 'view'])->name('siswa.view');
    Route::post('siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::post('siswa/edit/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::post('siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

    Route::get('kriteria', [KriteriaController::class, 'view']);
    Route::post('kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::post('kriteria/delete/{id}', [KriteriaController::class, 'delete'])->name('kriteria.delete');
    Route::post('kriteria/edit/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');

    Route::get('alternatif', [PenilaianController::class, 'view']);
    Route::get('alternatif/insert/{id}', [PenilaianController::class, 'insert'])->name('alternatif.insert');
    Route::post('alternatif/insert', [PenilaianController::class, 'store'])->name('alternatif.store');
    Route::post('alternatif/delete/{id}', [PenilaianController::class, 'delete'])->name('alternatif.delete');
    Route::post('alternatif/import', [PenilaianController::class, 'import'])->name('alternatif.import');
    route::get('/alternatif/detail/{id}', [PenilaianController::class, 'detail'])->name('alternatif.detail');


    Route::get('hasil', [HasilController::class, 'viewtahun']);
    Route::post('hasil/tahun', [HasilController::class, 'rangking'])->name('hasil.request');
    Route::post('detailhasil', [HasilController::class, 'view'])->name('detail.hasil');
    Route::post('hasil/lulus/{id}', [HasilController::class, 'isLulus'])->name('hasil.lulus');
    Route::post('hasil/tidak/{id}', [HasilController::class, 'isTidak'])->name('hasil.tidak');
    Route::post('hasil/delete/{id}', [HasilController::class, 'delete'])->name('hasil.delete');
    Route::get('hasil/cetak/{tahun}', [HasilController::class, 'generatePDF'])->name('hasil.cetak');

    Route::get('deleteuser', [UserController::class, 'index']);
    Route::post('deleteuser/del/{id}', [UserController::class, 'destroy'])->name('delete.user');
});


Route::post('session/register', [SessionController::class, 'create'])->name('session.create');



Auth::routes();

Route::middleware('auth', 'isSiswa')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/result', [App\Http\Controllers\HomeController::class, 'result'])->name('result');
    Route::post('/result/lulus/{id}', [HomeController::class, 'isLulus'])->name('siswa.bersedia');
    Route::post('/result/tidak/{id}', [HomeController::class, 'isTidak'])->name('siswa.tidak');
});
