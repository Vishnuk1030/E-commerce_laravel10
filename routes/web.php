<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CartController;
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

//shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

//each product viewing
Route::get('/shop/product/{slug}', [ShopController::class, 'productDetils'])->name('shop.product.details');

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//Add to cart
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');

//update cart
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

//RemoveItem
Route::delete('/cart/remove',[CartController::class,'removeItem'])->name('cart.remove');

//clearItem
Route::delete('/cart/clear',[CartController::class,'ClearCart'])->name('cart.clear');

