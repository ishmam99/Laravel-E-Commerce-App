<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CouponController;
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

Route::get('admin/home', [AdminController::class,'index'])->name('admin');
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
//Show sub category via ajax
Route::get('get/subcategory/{category_id}',[SubCategoryController::class,'getsub']); 

//Coupons All

Route::get('admin/coupon',[CouponController::class,'coupon'])->name('admin.coupon'); 

Route::post('admin/store/coupon',[CouponController::class,'store'])->name('store.coupon');
Route::get('coupon/{id}',[CouponController::class,'edit'])->name('edit.coupon'); 

Route::get('delete/coupon/{id}',[CouponController::class,'delete'])->name('delete.coupon');

Route::post('update/coupon/{id}',[CouponController::class,'update'])->name('update.coupon'); 

//Newslater
Route::get('admin/newslater',[CouponController::class,'newslater'])->name('admin.newslater');

Route::get('delete/subscriber/{id}',[CouponController::class,'delete_sub'])->name('delete.subscriber');

//Product Routes
Route::get('admin/all',[ProductController::class,'index'])->name('all.product');
Route::get('admin/add',[ProductController::class,'create'])->name('add.product');

Route::post('admin/store',[ProductController::class,'store'])->name('store.product');

Route::get('product/{id}',[ProductController::class,'edit'])->name('product.edit'); 
Route::get('inactive/product/{id}',[ProductController::class,'inactive'])->name('product.inactive'); 
Route::get('active/product/{id}',[ProductController::class,'active'])->name('product.active'); 
Route::get('delete/product/{id}',[ProductController::class,'delete'])->name('delete.product');
Route::get('show/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('product/update/{id}',[ProductController::class,'update'])->name('update.product');
Route::post('product/updatephoto/{id}',[ProductController::class,'updatephoto'])->name('update.productphoto');
//Front-end
Route::post('store/newslater',[FrontController::class,'storeNewslater'])->name('store.newslater');
