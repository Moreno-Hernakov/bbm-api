<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\MerkKendaraanController;
use App\Http\Controllers\WilayahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/data', [UserController::class, 'data']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/refresh', [UserController::class, 'refresh']);

    Route::controller(WilayahController::class)->group(function () {
        Route::get('/wilayah', 'index');
        Route::post('/wilayah', 'store');
        Route::put('/wilayah/{wilayah}', 'update');
        Route::delete('/wilayah/{wilayah}', 'destroy');
    });

    Route::controller(JenisKendaraanController::class)->group(function () {
        Route::get('/jeniskendaraan', 'index');
        Route::post('/jeniskendaraan', 'store');
        Route::put('/jeniskendaraan/{jeniskendaraan}', 'update');
        Route::delete('/jeniskendaraan/{jeniskendaraan}', 'destroy');
    });
    
    Route::controller(MerkKendaraanController::class)->group(function () {
        Route::get('/merkkendaraan', 'index');
        Route::post('/merkkendaraan', 'store');
        Route::put('/merkkendaraan/{merkkendaraan}', 'update');
        Route::delete('/merkkendaraan/{merkkendaraan}', 'destroy');
    });
});
