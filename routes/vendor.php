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

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// 👇 Place these outside vendor middleware (public)
Route::get('/vendor/email/verify', function () {
    return view('vendorpanel.auth.verify-email');
})->middleware('auth:vendor')->name('verification.notice');

Route::get('/vendor/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('vendor.dashboard');
})->middleware(['auth:vendor', 'signed'])->name('verification.verify');

Route::post('/vendor/email/verification-notification', function (Request $request) {
    $request->user('vendor')->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:vendor', 'throttle:6,1'])->name('vendor.verification.send');


Route::get('/vendor-register', [VendorController::class, 'vendorRegistration'])->name('vendor.signup');
Route::post('/register-submit', [VendorController::class, 'submit'])->name('registration.submit');

Route::get('/vendor-login', [VendorController::class, 'vendorSignIn'])->name('vendor.login');
Route::post('/login-submit', [VendorAuthController::class, 'login'])->name('vendor.login.submit');




/*Vendor Dashboard-------------------------------*/
Route::prefix('vendor')->name('vendor.')->middleware(['auth:vendor', 'verified', 'vendor.approved'])->group(function () {
    Route::get('logout', [VendorAuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [VendorDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [VendorDashboardController::class, 'profile'])->name('profile');
    Route::post('update-profile', [VendorDashboardController::class, 'updateProfile'])->name('updateProfile');
    Route::post('update-image', [VendorController::class, 'updateImage'])->name('updateImage');

    // Category
    Route::get('categories', [CategoryController::class, 'categories'])->name('categories');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    // Subcategory
    Route::resource('subcategories', SubCategoryController::class)->except(['show']);

    // Product
    Route::get('product/list', [ProductController::class, 'list'])->name('prolist');
    Route::get('product/add', [ProductController::class, 'add'])->name('proadd');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit', [ProductController::class, 'edit'])->name('proedit');

    // Coupon
    Route::get('coupon/list', [CouponController::class, 'list'])->name('couponlist');
    Route::post('coupon/add', [CouponController::class, 'store'])->name('couponstore');

    // Orders
    Route::get('order/list', [OrderController::class, 'orderlist'])->name('orderlist');
});

/*End Vendor Dashboard-------------------------------*/
