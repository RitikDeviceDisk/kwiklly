  <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;

 
  /*Customer Section-------------------------------*/
  Route::get('/login', [CustomerController::class, 'login'])->name('login');
  Route::get('/loginbyphone', [CustomerController::class, 'loginbyphone'])->name('loginbyphone');
  Route::get('/forgot', [CustomerController::class, 'forgot'])->name('forgot');
  Route::get('/signup', [CustomerController::class, 'signup'])->name('signup');
  Route::get('/myaccount', [CustomerController::class, 'myaccount'])->name('myaccount');
  /*EndCustomer Section-------------------------------*/
