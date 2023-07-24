<?php

use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Resources\DataResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutentikasiController;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

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

Route::get('/alamatKabupaten', function (Request $request) {
    return response()->json(Kabupaten::where('provinsi_id', $request->id)->get());
})->name('api_kabupaten');

Route::get('/alamatKecamatan', function (Request $request) {
    return response()->json(Kecamatan::where('kabupaten_id', $request->id)->get());
})->name('api_kecamatan');
