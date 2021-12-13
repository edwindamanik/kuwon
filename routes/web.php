<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginCheck'])->name('loginCheck');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('registerMember');

Route::get('/template', function() {
    return view('template.template');
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['Check_login:admin']], function() {
        Route::get('/my', [AdminController::class, 'index']);
        Route::get('/kelola-materi', [AdminController::class, 'materi']);
        Route::get('/kelola-materi/smp', [AdminController::class, 'materismp']);
        Route::get('/kelola-materi/sma', [AdminController::class, 'materisma']);
        Route::get('/kelola-materi/kuliah', [AdminController::class, 'materikuliah']);
        Route::get('/kelola-materi/tambahmateri', [AdminController::class, 'tambahmateri']);
        Route::post('/kelola-materi/tambahmateri', [AdminController::class, 'addMateri']);
        Route::get('/kelola-materi/smp/search', [AdminController::class, 'materismp']);
        Route::get('/kelola-materi/sma/search', [AdminController::class, 'materisma']);
        Route::get('/kelola-materi/kuliah/search', [AdminController::class, 'materikuliah']);
        Route::get('/kelola-materi/smp/{id}/edit', [AdminController::class, 'editsmp']);
        Route::post('/kelola-materi/smp/update', [AdminController::class, 'updatesmp']);
        Route::get('/kelola-materi/sma/{id}/edit', [AdminController::class, 'editsma']);
        Route::post('/kelola-materi/sma/update', [AdminController::class, 'updatesma']);
        Route::get('/kelola-materi/kuliah/{id}/edit', [AdminController::class, 'editkuliah']);
        Route::post('/kelola-materi/kuliah/update', [AdminController::class, 'updatekuliah']);
        Route::get('/kelola-materi/smp/{id}/delete', [AdminController::class, 'deleteMateri']);
        Route::get('/kelola-materi/sma/{id}/delete', [AdminController::class, 'deleteMateri']);
        Route::get('/kelola-materi/kuliah/{id}/delete', [AdminController::class, 'deleteMateri']);
        Route::get('/profile', [AdminController::class, 'profile']);
        Route::post('/profile/edit', [AdminController::class, 'updateProfile']);
        Route::get('/umpanBalik', [AdminController::class, 'lihatController']);
        Route::get('/soal', [AdminController::class, 'kelolaSoal']);
        Route::get('/soal/tambah-soal-smp', [AdminController::class, 'tambahSoalSmp']);
        Route::get('/soal/tambah-soal-sma', [AdminController::class, 'tambahSoalSma']);
        Route::get('/soal/tambah-soal-kuliah', [AdminController::class, 'tambahSoalKuliah']);
        Route::post('/soal/prosesSoal', [AdminController::class, 'prosesSoal']);
        Route::get('/soal/{kategori}/edit', [AdminController::class, 'editSoal']);
        Route::post('/soal/prosesEditSoal', [AdminController::class, 'prosesEditSoal']);
        Route::get('/soal/hapusSoal/{id}', [AdminController::class, 'hapusSoal']);
        Route::get('/my/leaderboard', [AdminController::class, 'leaderboardAdmin']);
    });

    Route::group(['middleware' => ['Check_login:user']], function() {
        Route::get('/dashboard', [UserController::class, 'index']);
        Route::get('/profilee', [UserController::class, 'profile']);
        Route::post('/profilee/edit', [UserController::class, 'updateProfile']);
        Route::get('/materi', [UserController::class, 'materi']);
        Route::get('/materi-belajar/{id}', [UserController::class, 'materiBelajar']);
        Route::get('/materi/search', [UserController::class, 'materi']);
        Route::get('/feedback', [UserController::class, 'feedback']);
        Route::post('/feedback/send', [UserController::class, 'sendFeedback']);
        Route::get('/latihanSoal/{judulMateri}', [UserController::class, 'latihanSoal']);
        Route::post('/cekPenilaian', [UserController::class, 'cekPenilaian']);
        Route::get('/leaderboard', [UserController::class, 'leaderboard']);
        Route::get('/donasi', [UserController::class, 'donasi']);
    });
});