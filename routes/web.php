<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//home route
Route::get('/', [BaseController::class, 'home'])->name('app.index');

//user route
Route::middleware('auth')->group(function () {
    Route::get('/my_acount', [UserController::class, 'index'])->name('user.index');
});

//admin route
Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop',[ShopController::class,'index'])->name('shop.index');

Route::get('/product/{slug}',[ShopController::class,'productDetils'])->name('shop.product.details');
