<?php

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;



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

Route::get('/', function () {
    return view('welcome');
});

//buat mahasiswa route 
Route::resource('mahasiswa', MahasiswaController::class);

// konfirmasi
Route::delete('/{nim}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
Route::get('/nialiraport/{id}', [MahasiswaController::class, 'khs'])->name('mahasiswa.nilairaport');




