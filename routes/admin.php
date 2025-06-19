<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\ProductImagesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MasterLocationController;

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
Route::group(['prefix' => 'admin'], function () {

    // Guest Routes (Login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.login');
        Route::post('login', [AdminController::class, 'loginCheck'])->name('admin.loginCheck');
    });

    // Authenticated Routes (Admin Panel)
    Route::middleware('auth:admin')->group(function () {

        // Admin Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Admin Vendor Management
        Route::get('/vendor/approve', [VendorController::class, 'approve'])->name('admin.vendor.approve');
        Route::get('/vendor/pending', [VendorController::class, 'pending'])->name('admin.vendor.pending');
        Route::get('/vendor/rejected', [VendorController::class, 'rejected'])->name('admin.vendor.rejected');
        Route::get('/vendor/{uuid}', [VendorController::class, 'show'])->name('admin.vendor.show');
        Route::put('/vendor/{uuid}/update-status', [VendorController::class, 'updateStatus'])->name('admin.vendor.updateStatus');



        // Attribute Management
        Route::get('/attributes', [AttributeController::class, 'index'])->name('admin.attributes');
        Route::post('/attributes/store', [AttributeController::class, 'store'])->name('admin.attribute.store');
        Route::post('/attributes/update/{id}', [AttributeController::class, 'update'])->name('admin.attribute.update');
        Route::get('/attributes/delete/{id}', [AttributeController::class, 'delete'])->name('admin.attribute.delete');

        // Attribute Value Management
        Route::get('/attribute-values', [AttributeController::class, 'indexAttributeValues'])->name('admin.attribute.values');
        Route::post('/attribute-values/store', [AttributeController::class, 'storeAttributeValue'])->name('admin.attribute.values.store');
        Route::post('/attribute-values/update/{id}', [AttributeController::class, 'updateAttributeValue'])->name('admin.attribute.value.update');
        Route::get('/attribute-values/delete/{id}', [AttributeController::class, 'softDeleteAttributeValue'])->name('admin.attribute.value.delete');

        //Banner Management
        Route::get('banner', [DashboardController::class, 'banner'])->name('admin.banner');
        Route::post('bannerstore', [DashboardController::class, 'bannerstore'])->name('admin.banner.store');
        Route::get('banners/delete/{id}', [DashboardController::class, 'bannerdestroy'])->name('admin.banners.delete');
        Route::post('banners/update/{id}', [DashboardController::class, 'bannerupdate'])->name('admin.banners.update');
        Route::get('deleted/banners', [DashboardController::class, 'deletedbanner'])->name('admin.banner.deleted');
        Route::delete('banner/force-delete/{id}', [DashboardController::class, 'forceDelete'])->name('admin.banners.forceDelete');


        // Category Management
        Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('category/create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('category/{id}/edit', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('category/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.category.delete');

        // Subcategory Management
        Route::get('subcategories', [CategoryController::class, 'indexSubcategory'])->name('admin.subcategories');
        Route::post('subcategory-store', [CategoryController::class, 'storeSubcategory'])->name('admin.subcategory.store');
        Route::post('subcategory/update/{id}', [CategoryController::class, 'updateSubcategory'])->name('admin.subcategory.update');
        Route::get('subcategory/delete/{id}', [CategoryController::class, 'softDeleteSubcategory'])->name('admin.subcategory.delete');
        Route::get('subcategory/restore/{id}', [CategoryController::class, 'restoreSubcategory'])->name('admin.subcategory.restore');
        Route::get('subcategory/force-delete/{id}', [CategoryController::class, 'forceDeleteSubcategory'])->name('admin.subcategory.forceDelete');

        //get attribute values
       // Route::get('get-attribute-values', [CategoryController::class, 'getAttributeValues'])->name('admin.get.attribute.values');


        // Product Images Management
        Route::get('product-images', [ProductImagesController::class, 'index'])->name('admin.product.images');
        Route::post('product-images-store', [ProductImagesController::class, 'store'])->name('admin.product.images.store');
        Route::post('product-images/update/{id}', [ProductImagesController::class, 'update'])->name('admin.product.images.update');
        Route::get('product-images/delete/{id}', [ProductImagesController::class, 'softDelete'])->name('admin.product.images.delete');
        Route::post('product-image/delete-single', [ProductImagesController::class, 'deleteSingleImage'])->name('admin.product.image.delete.single');

        Route::get('product-images/deleted', [ProductImagesController::class, 'showDeletedImages'])->name('admin.product.images.deleted');
        Route::post('product-images/{id}/restore', [ProductImagesController::class, 'restore'])->name('admin.product.images.restore');
        Route::delete('product-images/{id}/erase', [ProductImagesController::class, 'erase'])->name('admin.product.images.erase');


        // Product Management
        Route::get('products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('product/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('product/create', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('product/{id}/edit', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('product/{id}/delete', [ProductController::class, 'destroy'])->name('admin.product.delete');

        // Profile Management
        Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

        // Change Password
        Route::get('change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.password.change');
        Route::post('change-password', [AdminController::class, 'updatePassword'])->name('admin.password.update');

        // Logout
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    // Location Management
    Route::get('location', [MasterLocationController::class, 'index'])->name('admin.location');
    Route::get('location/add', [MasterLocationController::class, 'createLocation'])->name('admin.location.create');
    Route::post('location/store', [MasterLocationController::class, 'storeLocation'])->name('admin.location.store');
    Route::get('location/delete/{id}', [MasterLocationController::class, 'deleteLocation'])->name('admin.location.delete');
    Route::post('location/update/{id}', [MasterLocationController::class, 'updateLocation'])->name('admin.location.update');
    Route::get('location/deleted', [MasterLocationController::class, 'deletedLocation'])->name('admin.location.deleted');
    Route::delete('location/force-delete/{id}', [MasterLocationController::class, 'forceDeleteLocation'])->name('admin.location.forceDelete');

});


// Route::get('/admin/banner', function () {
//     return view('admin.ba nner');
// });

// Route::get('/admin/category', function () {
//     return view('admin.category');
// });

// Route::get('/admin/subcategory', function () {
//     return view('admin.subcategory');
// });

// Route::get('/admin/add-product', function () {
//     return view('admin.add-product');
// });



