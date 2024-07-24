<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utama\KpController;
use App\Http\Controllers\Utama\PtController;
use App\Http\Controllers\Utama\RsController;
use App\Http\Controllers\Utama\StController;
use App\Http\Controllers\Utama\TkController;
use App\Http\Controllers\Utama\MallController;
use App\Http\Controllers\Utama\FasumController;
use App\Http\Controllers\Utama\PolsekController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\KecamatanController;
use App\Http\Controllers\Dashboard\KelurahanController;


Route::get('/', [FasumController::class, 'index2']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/fasum', FacilityController::class)->middleware('auth');
Route::resource('/dashboard/kategori', CategoryController::class)->middleware('auth');
Route::resource('/dashboard/kelurahan', KelurahanController::class)->middleware('auth');
Route::resource('/dashboard/kecamatan', KecamatanController::class)->middleware('auth');

Route::get('/peta', [FasumController::class, 'index_peta']);
Route::get('/fasum', [FasumController::class, 'index']);


Route::get('Rumah-Sakit', [RsController::class, 'index_rs']);
Route::get('Rumah-Sakit/{id}', [RsController::class, 'show_rs']);
Route::get('peta/{id}', [RsController::class, 'show_peta']);

Route::get('Sarana-Transportasi', [StController::class, 'index_st']);
Route::get('Sarana-Transportasi/{id}', [StController::class, 'show_st']);

Route::get('Taman-Kota', [TkController::class, 'index_tk']);
Route::get('Taman-Kota/{id}', [TkController::class, 'show_tk']);

Route::get('Mall', [MallController::class, 'index_mall']);
Route::get('Mall/{id}', [MallController::class, 'show_mall']);

Route::get('Polsek', [PolsekController::class, 'index_polsek']);
Route::get('Polsek/{id}', [PolsekController::class, 'show_polsek']);

Route::get('Kantor-Pemerintahan', [KpController::class, 'index_kp']);
Route::get('Kantor-Pemerintahan/{id}', [KpController::class, 'show_kp']);

Route::get('Perguruan-Tinggi', [PtController::class, 'index_pt']);
Route::get('Perguruan-Tinggi/{id}', [PtController::class, 'show_pt']);
