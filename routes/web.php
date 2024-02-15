<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HargaPasarController;

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


Route::get('/tambah-data', [HargaPasarController::class, 'create']);
Route::post('/tambah-data', [HargaPasarController::class, 'store']);
Route::resource('/', HargaPasarController::class);
Route::post('/', [HargaPasarController::class, 'index']);
Route::get('/tampil-data', [HargaPasarController::class, 'tampilData']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/excel', [AdminController::class, 'laporanExcel']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
