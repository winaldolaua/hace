<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('beranda',[
        "title" => "beranda"
    ]);
});

Route::get('/beranda', function () {
    return view('beranda',[
        "title" => "beranda"
    ]);
});

Route::get('/sertifikasi', function () {
    return view('sertifikasi', [
        "title" => "sertifikasi",
        "active" => 'sertifikasi'
    ]);
});

Route::get('/status', function () {
    return view('status', [
        "title" => "status",
        "active" => 'status'
    ]);
});

Route::get('/tagihan', function () {
    return view('tagihan', [
        "title" => "tagihan",
        "active" => 'tagihan'
    ]);
});

Route::get('/editprof', function () {
    return view('editprof', [
        "title" => "editprof",
        "active" => 'editprof'
    ]);
});

Route::get('/editprof', function () {
    return view('editprof');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest') ;
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);



