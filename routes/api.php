<?php

use App\Models\User;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('email_check', function(Request $request){
    if (count(User::where('email', $request->email)->get()) == 0) {
        return 'true';
    }
    else {
        return 'false';
    }
})->name('check_email_register');

Route::get('/alamatKabupaten', function (Request $request) {
    return response()->json(Kabupaten::where('provinsi_id', $request->id)->get());
})->name('api_kabupaten');

Route::get('/alamatKecamatan', function (Request $request) {
    return response()->json(Kecamatan::where('kabupaten_id', $request->id)->get());
})->name('api_kecamatan');

