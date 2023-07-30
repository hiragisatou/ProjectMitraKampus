<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\MailVerificationController;
use App\Http\Controllers\SettingController;

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
Route::get('/home', function () {
   return redirect(route('home'));
});

Route::controller(AutentikasiController::class)->group(function () {
    Route::get('/register', 'registerPage')->middleware('guest')->name('register');
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::get('/loginAdmin', 'indexAdmin')->middleware('guest')->name('loginAdmin');
    Route::get('/profile', 'profileMitra')->middleware('auth')->name('profilMitra');
    Route::get('/updateakun', 'update')->middleware('auth')->name('updateAkun');
    Route::get('/forgot-password', 'resetPassword')->middleware('guest')->name('password.request');
    Route::get('/reset-password/{token}', 'formReset')->middleware('guest')->name('password.reset');

    Route::post('/auth/register', 'registerHandler')->name('registerHandler');
    Route::post('/auth/login', 'loginHandler')->name('loginHandler');
    Route::post('/auth/logout', 'logoutHandler')->name('logoutHandler');
    Route::post('/auth/profile', 'profileHandler')->name('profileHandler');
    Route::post('/update', 'updateHandler')->middleware('auth')->name('updateAkunHandler');
    Route::post('/forgot-password', 'resetPasswordLink')->middleware('guest')->name('password.email');
    Route::post('/reset-password', 'resetPasswordHandler')->middleware('guest')->name('password.update');
});

Route::controller(MailVerificationController::class)->group(function () {
    Route::get('/email/verify', 'verifyNotice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verifyConfirm')->middleware(['auth', 'signed'])->name('verification.verify');;
    Route::post('/email/verification-notification', 'verifySend')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('aboutUs');
    Route::get('/contact', 'contact')->name('contactUs');
    Route::get('/faq', 'faq')->name('FAQ');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'viewDashboard')->name('dashboard');
        Route::get('/pengajuan', 'viewPengajuan')->name('PengajuanMoU');
        Route::get('/pengajuan/{pengajuan}', 'detailPengajuan')->name('detailPengajuan');
        Route::get('/admin/profile', 'viewEditProfile')->name('editProfile');
        Route::get('/list-pengajuan', 'listPengajuan')->name('viewListPengajuan');
        Route::get('/list-mitra', 'listMitra')->name('viewListMitra');
        Route::get('/detail-mitra/{mitra}', 'DetailMitra')->name('detailMitra');
        Route::post('/admin/profile/handler', 'editProfile')->name('editProfileHandler');
        Route::post('/pengajuanMoU', 'pengajuanMoU')->name('pengajuanMoUHandler');
        Route::post('/verifyMoU', 'verifyMoU')->name('VerifyMoU');
        Route::post('/tolakMoU', 'tolakMoU')->name('tolakMoU');
        Route::delete('/pengajuan/{pengajuan}', 'deletePengajuan')->name('deletePengajuan');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('/set-prodi', 'viewProdi')->name('viewSetProdi');
        Route::post('/set-prodi', 'store')->name('addProdi');
    });
});
