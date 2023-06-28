<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\TiketController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    
    //ini crud news
    Route::resource('/news', NewsController::class);
    
    //ini crud category
    Route::resource('/category', CategoryController::class);
    
    
    //ini crud tiket
    Route::resource('/tiket', TiketController::class);

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
});
