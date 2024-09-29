<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PolosanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\ErrorApplicationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingMenuController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PostinganController; // Add this line
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('userpage.index');
})->name('userpage');

Route::middleware(['auth', 'admin', 'timezone', 'log.error', 'check.menu.access'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/polosan', [PolosanController::class, 'index'])->name('polosan');
        Route::resource('satuan', SatuanController::class)->middleware('log.activity');
        Route::resource('user', UserController::class)->middleware('log.activity');
        Route::resource('jenis_user', JenisUserController::class)->middleware('log.activity');
        Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan')->middleware('log.activity');
        Route::get('settings/profile', [DashboardController::class, 'indexsettingsprofile'])->name('profile')->middleware('log.activity');
        Route::put('settings/profile/{user}', [DashboardController::class, 'updateprofile'])->name('profile.update')->middleware('log.activity');
        Route::get('aktivitas/user', [UserActivityController::class, 'index'])->name('aktivitas');
        Route::get('aktivitas/error_aplikasi', [ErrorApplicationController::class, 'index'])->name('aktivitas.error');
        Route::resource('menu', MenuController::class)->middleware('log.activity');
        Route::resource('setting_menus', SettingMenuController::class)->middleware('log.activity');
        Route::resource('buku', BukuController::class)->middleware('log.activity');
        Route::resource('kategori_buku', KategoriBukuController::class)->middleware('log.activity');
        Route::resource('mahasiswa', MahasiswaController::class)->middleware('log.activity');

        Route::get('/inbox', [PesanController::class, 'inbox'])->name('inbox');
        Route::get('/sent', [PesanController::class, 'sent'])->name('sent');
        Route::get('/sent/create', [PesanController::class, 'create'])->name('sent.create');
        Route::post('/sent', [PesanController::class, 'store'])->name('sent.store');
        Route::get('/inbox/{id}', [PesanController::class, 'show'])->name('inbox.show');
        Route::get('/inbox/{id}/reply', [PesanController::class, 'reply'])->name('inbox.reply');
        Route::post('/inbox/{id}/reply', [PesanController::class, 'sendReply'])->name('inbox.sendReply');
        Route::delete('/inbox/{id}', [PesanController::class, 'destroy'])->name('inbox.destroy');

        // Routes for Posting
        Route::resource('postingan', PostinganController::class)->middleware('log.activity');

        // Like and Comment Routes
        Route::post('postingan/{id}/like', [PostinganController::class, 'like'])->name('postingan.like');
        Route::post('postingan/{id}/comment', [PostinganController::class, 'comment'])->name('postingan.comment');
    });
});
