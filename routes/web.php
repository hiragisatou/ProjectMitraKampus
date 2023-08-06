<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'viewLogin')->middleware('guest')->name('login');
    Route::get('/register', 'viewRegister')->middleware('guest')->name('register');
    Route::get('/forgot-password', 'viewForgotPassword')->middleware('guest')->name('password.request');
    Route::get('/email/verify', 'viewVerifyNotice')->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verificationMailHandler')->middleware(['auth', 'signed'])->name('verification.verify');
    Route::get('/profile', 'viewAddProfile')->middleware('auth')->name('add_profile');
    Route::get('/profile/edit', 'viewEditProfile')->middleware('auth')->name('edit_profile');
    Route::get('/update_account', 'viewUpdateAccount')->middleware('auth')->name('view_update_account');

    Route::post('/update_account', 'updateAccountHandler')->middleware('auth')->name('update_account_handler');
    Route::post('/profile', 'profileHandler')->middleware('auth')->name('profile_handler');
    Route::post('/login', 'loginHandler')->middleware('guest')->name('login_handler');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout_handler');
    Route::post('/register', 'registerHandler')->middleware('guest')->name('register_handler');
    Route::post('/email/verification-notification', 'verificationSend')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    // Route::get('/about', 'about')->name('aboutUs');
    // Route::get('/contact', 'contact')->name('contactUs');
    // Route::get('/faq', 'faq')->name('FAQ');
});

Route::middleware(['auth', 'verified', 'hasProfile'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'viewDashboard')->name('dashboard');
        Route::get('/pengajuan_mou', 'viewPengajuan')->name('pengajuan_mou');
        Route::get('/list-pengajuan_mou', 'viewListPengajuan')->name('view_list_pengajuan');
        Route::get('/pengajuan_mou/{mou}', 'viewDetailPengajuan')->name('detail_pengajuan');
        Route::get('/list-mitra', 'viewListMitra')->name('view_list_mitra');
        Route::get('/mitra/{mitra}', 'viewDetailMitra')->name('detail_mitra');

        Route::post('/pengajuan_mou', 'pengajuanMoU')->name('pengajuan_mou_handler');
        Route::post('/verifyMoU', 'verificationMou')->name('verify_mou_handler');
        // Route::post('/tolakMoU', 'tolakMoU')->name('tolakMoU');
        // Route::delete('/pengajuan/{pengajuan}', 'deletePengajuan')->name('deletePengajuan');
    });
});
