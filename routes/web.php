<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Artisan;


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

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('clear-compiled');
    echo '<center> Cache cleared!!</center>';
    // return view('admin/dashboard.clear_cache');
})->name('clear.all.cache');

require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/customer.php';
// Route::get('/', function () {
//     return view('welcome');
// });


/*Website-------------------------------*/
  Route::get('/', [HomeController::class, 'index']);
  Route::get('/department', [HomeController::class, 'department'])->name('department');
  Route::get('/stores/{slug?}', [HomeController::class, 'stores'])->name('stores');
  Route::get('/productdetails', [HomeController::class, 'productdetails'])->name('productdetails');
  Route::get('/explorestore', [HomeController::class, 'explorestore'])->name('explorestore');
  Route::get('/searchresults', [HomeController::class, 'searchresults'])->name('searchresults');
  /*End Website-------------------------------*/



