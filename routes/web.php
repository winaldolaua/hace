<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\SertificationController;
use App\Models\Sertification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});
Route::controller(UserLoginController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'beranda');
    });
});
Route::controller(RegisterController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'index');
        Route::post('/register', 'store');
    });
});
Route::controller(SertificationController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/sertifikasi', 'sertifikasi');
        Route::get('/sertifikasi/add', 'addSertif');
        Route::get('/sertifikasi/detail/{id_number}', 'detilSertif');
        Route::post('/sertification/add', 'addSertifPost')->name('add-sertif');
        Route::post('/updateStatus', 'updateStatusSertif')->name('update-status-sertif');
    });
});
