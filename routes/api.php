<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('mahasiswa/{id}', [MahasiswaController::class, 'show']);
// Route::get('mata-kuliah/{id}', [MataKuliahController::class, 'show']);
// Route::get('assign', [MahasiswaController::class, 'setMataKuliah']);

// Route::post('create-mahasiswa', [MahasiswaController::class, 'store']);
// Route::post('create-mata-kuliah', [MataKuliahController::class, 'store']);
