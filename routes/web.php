<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'loginPage');
    Route::get('/register', 'registerPage');
    Route::get('/verifymail', 'verifyMailPage');
});
Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage');
Route::get('/register', [UserController::class, 'registerPage'])->name('registerPage');
