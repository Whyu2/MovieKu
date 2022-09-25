<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Models\Kategori;

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




Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'auth'])->name('auth');

Route::get('/', [HalamanController::class,'index'])->name('index');
Route::get('/{slug}', [HalamanController::class,'detail'])->name('detail');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/movie', [MovieController::class,'index'])->name('movie');
    Route::get('/admin/add_movie',[MovieController::class,'create'])->name('add_movie');
    Route::post('/movie/store', [MovieController::class, 'store'])->name('store');
    Route::get('/movie/edit/{id}',  [MovieController::class, 'edit'])->name('edit_movie');
    Route::post('/movie/update/{id}',  [MovieController::class, 'update'])->name('update_movie');
    Route::delete('/movie/delete/', [MovieController::class, 'destroy'])->name('movie_delete');

    Route::get('/admin/kategori', [KategoriController::class,'index'])->name('kategori');
    Route::get('/admin/add_kategori', [KategoriController::class,'create'])->name('add_kategori');
    Route::post('/kategori/store', [KategoriController::class,'store'])->name('store');
    Route::get('/kategori/edit/{id}',  [KategoriController::class, 'edit'])->name('edit_kategori');
    Route::post('/kategori/update/{id}',  [KategoriController::class, 'update'])->name('update_kategori');
    Route::delete('/kategori/delete/', [KategoriController::class, 'destroy'])->name('kategori_delete');

    Route::post('/logout', [LoginController::class,'logout'])->name('logout');
});