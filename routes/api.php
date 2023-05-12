<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\MerkKendaraanController;
use App\Http\Controllers\WilayahController;

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KomposisiController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UnitController;
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

    // ==================================================================

    Route::controller(AreaController::class)->group(function () {
        Route::get('/area', 'index');
        Route::post('/area', 'store');
        Route::put('/area/{area}', 'update');
        Route::delete('/area/{area}', 'destroy');
    });

    Route::controller(KomposisiController::class)->group(function () {
        Route::get('/komposisi', 'index');
        Route::post('/komposisi', 'store');
        Route::put('/komposisi/{komposisi}', 'update');
        Route::delete('/komposisi/{komposisi}', 'destroy');
    });

    Route::controller(KendaraanController::class)->group(function () {
        Route::get('/kendaraan', 'index');
        Route::post('/kendaraan', 'store');
        Route::put('/kendaraan/{kendaraan}', 'update');
        Route::delete('/kendaraan/{kendaraan}', 'destroy');
    });

    Route::controller(UnitController::class)->group(function () {
        Route::get('/unit', 'index');
        Route::post('/unit', 'store');
        Route::put('/unit/{unit}', 'update');
        Route::delete('/unit/{unit}', 'destroy');
    });
});
