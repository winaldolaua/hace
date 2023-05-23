<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// --------------------------- API Product ---------------------------
Route::controller(ProductController::class)->group(function(){
    Route::get('products/list','list');
});
Route::resource('products',ProductController::class);
// --------------------------- END Product ---------------------------

// --------------------------- API Autentikasi ---------------------------
Route::controller(AuthController::class)->group(function(){
    Route::post('register','register');
});
// --------------------------- END Autentikasi ---------------------------
