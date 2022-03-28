<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DangNhapKHController;
use App\Http\Controllers\Api\DangKyKHController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\TheoDoiThucPhamController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(DangNhapKHController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::post('/DangNhapKH', 'index');
    //Route::get('/contact-us', 'contact');
});

Route::controller(DangKyKHController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::post('/DangKyKH', 'Register');
    //Route::get('/contact-us', 'contact');
});

Route::controller(SearchController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::get('/LoaiThucPhams', 'GetLoaiThucPhams');
    Route::get('/Search/{id}/{input}', 'GetThucPhams');
});

Route::controller(TheoDoiThucPhamController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::get('/TheoDoiThucPham/{id}', 'Get');
});


