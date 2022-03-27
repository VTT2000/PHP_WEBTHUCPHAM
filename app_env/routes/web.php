<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GioHangController;


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



Route::get('/product',[ProductController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', function () {
    return view('admin/admin');
});


Route::get('/',[HomeController::class, 'index']);
Route::controller(GioHangController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::get('/GioHang/ThemGioHang', 'ThemGioHang');
    Route::get('/GioHang/Index', 'Index');
    Route::get('/GioHang/ThemMot', 'ThemMot');
    Route::get('/GioHang/GiamMot', 'GiamMot');
    Route::get('/GioHang/CapNhatGioHang', 'CapNhatGioHang');
    Route::get('/GioHang/DeleteGH', 'DeleteGH');
});

//Auth::routes();




