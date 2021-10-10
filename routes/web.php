<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LoginController;
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
    return view('pages.index');
}); 

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


//admin routes

Route::get('admin/home', [AdminController::class,'index']);
Route::get('admin', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('admin', [LoginController::class,'login']);
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('admin/ChangePassword',[AdminController::class,'ChangePassword'])->name('admin.password.change');
Route::post('admin/UpdatePassword',[AdminController::class,'UpdatePassword'])->name('admin.password.update');
//
