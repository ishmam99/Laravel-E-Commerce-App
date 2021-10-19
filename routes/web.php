<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LoginController;

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\BrandController;
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
    //Category routes
Route::get('admin/categories',[CategoryController::class,'category'])->name('category');
Route::post('admin/store/categories',[CategoryController::class,'store'])->name('store.category');

Route::post('update/category/{id}',[CategoryController::class,'update'])->name('update.category'); 
Route::get('category/{id}',[CategoryController::class,'edit'])->name('category.edit'); 
Route::get('delete/category/{id}',[CategoryController::class,'delete'])->name('delete.category'); 
 //Brands routes
Route::get('admin/brand',[BrandController::class,'brand'])->name('brands'); 
Route::post('admin/store/brands',[BrandController::class,'store'])->name('store.brand');

Route::post('update/brand/{id}',[BrandController::class,'update'])->name('update.brand'); 
Route::get('brand/{id}',[BrandController::class,'edit'])->name('brand.edit'); 
Route::get('delete/brand/{id}',[BrandController::class,'delete'])->name('delete.brand');


//Sub Category Routes
Route::get('admin/subcategory',[SubCategoryController::class,'subcategory'])->name('subcategory');
Route::post('admin/store/subcategory',[SubCategoryController::class,'store'])->name('store.subcategory');
Route::get('subcategory/{id}',[SubCategoryController::class,'edit'])->name('edit.subcategory'); 

Route::get('delete/subcategory/{id}',[SubCategoryController::class,'delete'])->name('delete.subcategory');

Route::post('update/subcategory/{id}',[SubCategoryController::class,'update'])->name('update.subcategory'); 