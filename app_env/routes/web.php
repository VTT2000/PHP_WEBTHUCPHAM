<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ListFoodController;
use App\Http\Controllers\AccountController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\DeleteController;
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



Route::controller(HomeController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::get('/', 'index');
    Route::get('/Home/index', 'index');
    Route::get('/Home/Index', 'index');
    Route::get('/Home/LogOut', 'LogOut');
});

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

Route::controller(ThanhToanController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::get('/ThanhToan/Index', 'Index');
    Route::get('/ThanhToan/ThanhToanThuong', 'ThanhToanThuong');
    Route::get('/ThanhToan/ThanhToanPaypal', 'ThanhToanPaypal');
});

Route::controller(ListFoodController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::get('/ListFood/Index', 'Index');
    Route::get('/ListFood/FoodTheoLoai', 'FoodTheoLoai');
    Route::get('/ListFood/FoodTheoNCC', 'FoodTheoNCC');
    Route::get('/ListFood/FoodDuocKM', 'FoodDuocKM');
});

Route::controller(AccountController::class)->group(
    //['middleware' => 'web'],
    function () {
    Route::get('/Account/Index', 'Index');
    Route::post('/Account/Index0', 'Index0');
    Route::get('/Account/Invoice', 'Invoice');
    Route::get('/Account/DetailInvoice', 'DetailInvoice');
    Route::get('/Account/FollowedFood', 'FollowedFood');
    Route::get('/Account/DeleteFollowedFood', 'DeleteFollowedFood');
});

Route::get('/Food/Index',[FoodController::class, 'index']);

//Auth::routes();

Route::get('admin/login', function() {
    return view('admin.login');
});

Route::post('/admin/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
//Route::get('/admin/admin', [AdminController::class, 'admin'])->name('admin.admin');

Route::get('admin/admin', function () {
    return view('admin.admin');
});

Route::get('/admin/listing/{model}', [ListingController::class, 'index'])->name('listing.index');
Route::post('/admin/listing/{model}', [ListingController::class, 'index'])->name('listing.index');

Route::get('/admin/add/{model}', [AddController::class, 'create'])->name('add.create');
Route::post('/admin/add/{model}', [AddController::class, 'store'])->name('add.store');

Route::get('/admin/update/{model}', [UpdateController::class, 'up'])->name('update.up');
Route::post('/admin/update/{model}', [UpdateController::class, 'updateitem'])->name('update.updateitem');

Route::get('/admin/delete/{model}', [DeleteController::class, 'del'])->name('delete.del');
Route::post('/admin/delete/{model}', [DeleteController::class, 'deleteitem'])->name('delete.deleteitem');