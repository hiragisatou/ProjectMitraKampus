<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApiController::class)->group(function () {
    Route::post('/email_check', 'checkEmail')->name('check_email_register');
    Route::get('/provinsi', 'selectProvinsi')->name('select_provinsi');
    Route::get('/kabupaten', 'selectKabupaten')->name('select_kabupaten');
    Route::get('/kecamatan', 'selectKecamatan')->name('select_kecamatan');
});
