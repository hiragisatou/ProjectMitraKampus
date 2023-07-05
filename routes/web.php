<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\MailVerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    Route::get('/login', 'index')->name('login');
    Route::get('/profile', 'profileMitra')->name('profilMitra');
    Route::get('/forgot-password', 'resetPassword')->middleware('guest')->name('password.request');
    Route::get('/reset-password/{token}', 'formReset')->middleware('guest')->name('password.reset');

    Route::post('/auth/register', 'registerHandler')->name('registerHandler');
    Route::post('/auth/login', 'loginHandler')->name('loginHandler');
    Route::post('/auth/logout', 'logoutHandler')->name('logoutHandler');
    Route::post('/forgot-password', 'resetPasswordLink')->middleware('guest')->name('password.email');
    Route::post('/reset-password', 'resetPasswordHandler')->middleware('guest')->name('password.update');
});

Route::controller(MailVerificationController::class)->group(function () {
    Route::get('/email/verify', 'verifyNotice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verifyConfirm')->middleware(['auth', 'signed'])->name('verification.verify');;
    Route::post('/email/verification-notification', 'verifySend')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index');
});
