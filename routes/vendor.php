<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorAuthController;
use App\Http\Controllers\Vendor\VendorDashboardController;

use App\Http\Controllers\Vendor\CategoryController;
use App\Http\Controllers\Vendor\SubCategoryController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\CouponController;
use App\Http\Controllers\Vendor\OrderController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/vendor-register', [VendorController::class, 'vendorRegistration'])->name('vendor.signup');
Route::post('/register-submit', [VendorController::class, 'submit'])->name('registration.submit');

Route::get('/vendor-login', [VendorController::class, 'vendorSignIn'])->name('vendor.login');
Route::post('/login-submit', [VendorAuthController::class, 'login'])->name('vendor.login.submit');

/*Vendor Dashboard-------------------------------*/
Route::prefix('vendor')->name('vendor.')->middleware('auth:vendor')->group(function () {
Route::get('logout', [VendorAuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [VendorDashboardController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorDashboardController::class, 'profile'])->name('profile');
Route::post('update-profile', [VendorDashboardController::class, 'updateProfile'])->name('updateProfile');
Route::post('update-image', [VendorController::class, 'updateImage'])->name('updateImage');

/*Category Section*/ 
    Route::get('categories', [CategoryController::class, 'categories'])->name('categories');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

/*End Category Section*/ 


/*Sub-Category Section*/ 
Route::resource('subcategories', SubCategoryController::class)->except(['show']);
/*End Sub-Category Section*/ 

Route::get('product/list', [ProductController::class, 'list'])->name('prolist');
Route::get('product/add', [ProductController::class, 'add'])->name('proadd');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/edit', [ProductController::class, 'edit'])->name('proedit');

Route::get('coupon/list', [CouponController::class, 'list'])->name('couponlist');
Route::post('coupon/add', [CouponController::class, 'store'])->name('couponstore');
Route::get('order/list', [OrderController::class, 'orderlist'])->name('orderlist');
});

/*End Vendor Dashboard-------------------------------*/
