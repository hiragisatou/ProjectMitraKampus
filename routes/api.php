<?php

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::get('/jurusan', function () {
    return response()->json(Jurusan::all());
})->name('data_jurusan');

Route::get('/prodi_detail', function (Request $request) {
    return response()->json(Prodi::find($request->id));
})->name('data_prodi');
Route::post('email_check', function(Request $request){
    if (count(User::where('email', $request->email)->get()) == 0) {
        return 'true';
    }
    else {
        return 'false';
    }
})->name('check_email_register');

Route::get('password_check/{user}', function(User $user, Request $request) {
    if (Hash::check($request->password, $user->password)) {
        return 'true';
    } else {
        return 'false';
    }
})->name('check_password_update');

Route::get('/alamatKabupaten', function (Request $request) {
    return response()->json(Kabupaten::where('provinsi_id', $request->id)->get());
})->name('api_kabupaten');

Route::get('/alamatKecamatan', function (Request $request) {
    return response()->json(Kecamatan::where('kabupaten_id', $request->id)->get());
})->name('api_kecamatan');

