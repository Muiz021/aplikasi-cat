<?php

use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\SoalController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('daftar', [UserController::class, 'daftar'])->name('daftar');
Route::post('daftar', [UserController::class, 'store'])->name('user.store');


##fitur admin##
Route::prefix('admin')->middleware(['auth', 'OnlyAdmin'])->group(function () {
    ##dashboard##
    Route::get('dashboard', function () {
        return view('pages.admin.dashboard.dashboard');
    })->name('admin.dashboard');
    ##end dashboard##

    ##user(mahasiswa)##
    Route::resource('user', UserController::class)->except('create', 'store');
    ##end user(mahasiswa)##

    ##mata pelajaran##
    Route::resource('pelajaran', PelajaranController::class);
    ##end mata pelajaran##

    ##soal##
    Route::resource('soal', SoalController::class)->except('create', 'store');
    Route::get('soal/{id}/create', [SoalController::class, 'create'])->name('soal.create');
    Route::post('soal/{id}/create', [SoalController::class, 'store'])->name('soal.store');
    ##end soal##

    ##jawaban##
    Route::resource('jawaban', JawabanController::class)->except('index', 'show', 'store', 'edit');
    Route::get('jawaban/{id}', [JawabanController::class, 'index'])->name('jawaban.index');
    Route::post('jawaban/{id}/create', [JawabanController::class, 'store'])->name('jawaban.store');
    ##end jawaban##

    ##ujian##
    Route::get('ujian',[UjianController::class,'index'])->name('admin.ujian.index');
    Route::get('ujian/{id}/show',[UjianController::class,'show'])->name('admin.ujian.show');
    Route::get('ujian-detail/{id}/show',[UjianController::class,'detail_show'])->name('admin.detail-ujian.show');
    ##end ujian##

    ##logout##
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    ##end logout##
});
##end fitur admin##

##fitur pelajar##
Route::prefix('pelajar')->middleware(['auth', 'OnlyPelajar'])->group(function () {
    ##dashboard##
    Route::get('dashboard', function () {
        return view('pages.pelajar.dashboard.dashboard');
    })->name('pelajar.dashboard');
    ##end dashboard##

    Route::resource('ujian',UjianController::class);

    ##logout##
    Route::get('logout', [AuthController::class, 'logout'])->name('pelajar.logout');
    ##end logout##
});
    ##end fitur pelajar##
