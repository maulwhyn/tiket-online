<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TiketController;



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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/blog/detail/{news:slug}', [MainController::class, 'detail'])->name('blog.detail');

Route::redirect('/home', '/admin');

Route::redirect('/login', '/admin/login');

Route::get('/category/checkSlug', [CategoryController::class, 'checkSlug']);
Route::get('/news/checkSlug', [NewsController::class, 'checkSlug']);
Route::get('/tiket/checkSlug', [TiketController::class, 'checkSlug']);

Route::post('/transaksi', [MainController::class, 'store'])->name('client.transaksi');
Route::get('/transaksi/{tiket:slug}', [MainController::class, 'show'])->name('show.transaksi');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
