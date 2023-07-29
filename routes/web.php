<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserLoginController;

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
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login','authenticate');
    Route::post('/logout', 'logout');
});
Route::controller(UserLoginController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/', 'beranda');
        Route::get('/tagihan', 'tagihan');
        Route::get('/status', 'status');
        Route::get('/sertifikasi', 'sertifikasi');
        Route::get('/edit-profile', 'editProfile');
        Route::get('/kelus', 'kelus');
    });
});
Route::controller(RegisterController::class)->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/register', 'index');
        Route::post('/register', 'store');
    });
});