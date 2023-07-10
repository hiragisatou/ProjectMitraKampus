<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\MailVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AutentikasiController::class)->group(function () {
    Route::get('/register', 'registerPage')->name('register');
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::get('/profile', 'profileMitra')->middleware('auth')->name('profilMitra');
    Route::get('/forgot-password', 'resetPassword')->middleware('guest')->name('password.request');
    Route::get('/reset-password/{token}', 'formReset')->middleware('guest')->name('password.reset');

    Route::post('/auth/register', 'registerHandler')->name('registerHandler');
    Route::post('/auth/login', 'loginHandler')->name('loginHandler');
    Route::post('/auth/logout', 'logoutHandler')->name('logoutHandler');
    Route::post('/auth/profile', 'profileHandler')->name('profileHandler');
    Route::post('/forgot-password', 'resetPasswordLink')->middleware('guest')->name('password.email');
    Route::post('/reset-password', 'resetPasswordHandler')->middleware('guest')->name('password.update');
});

Route::controller(MailVerificationController::class)->group(function () {
    Route::get('/email/verify', 'verifyNotice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verifyConfirm')->middleware(['auth', 'signed'])->name('verification.verify');;
    Route::post('/email/verification-notification', 'verifySend')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/admin/dashboard', 'viewDashboard')->name('dashboard');
    Route::get('/admin/pengajuan', 'viewPengajuan')->name('PengajuanMoU');
});
