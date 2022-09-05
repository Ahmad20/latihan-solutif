<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

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

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/register', [AdminController::class, 'registerView'])->name('registerView');
        Route::post('/register', [AdminController::class, 'register'])->name('register');   

        Route::get('/login', [AdminController::class, 'loginView'])->name('loginView');
        Route::post('/login', [AdminController::class, 'login'])->name('login');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [AdminController::class, 'logout']);

        Route::post('/add/mahasiswa', [MahasiswaController::class, 'store'])->name('storeMhs');
        Route::get('/add/mahasiswa', [MahasiswaController::class, 'create'])->name('createMhs');
        
        Route::post('/edit/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('updateMhs');
        Route::get('/edit/mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('editMhs');

        Route::get('/delete/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('deleteMhs');

        Route::get('/print/mahasiswa/{id}', [AdminController::class, 'printPDF']);
    });
});

Route::prefix('mhs')->name('mhs.')->group(function(){
    Route::middleware(['guest:mhs'])->group(function(){
        Route::get('/register', [MahasiswaController::class, 'registerView'])->name('registerView');
        Route::post('/register', [MahasiswaController::class, 'register'])->name('register');   

        Route::get('/login', [MahasiswaController::class, 'loginView'])->name('loginView');
        Route::post('/login', [MahasiswaController::class, 'login'])->name('login');
    });

    Route::middleware(['auth:mhs'])->group(function(){
        Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [MahasiswaController::class, 'logout']);
    });
});
// Route::post('/edit/mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('editMhs');
Route::get('mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::get('mata-kuliah/{id}', [MataKuliahController::class, 'show']);
Route::get('assign', [MahasiswaController::class, 'setMataKuliah']);

Route::post('create-mahasiswa', [MahasiswaController::class, 'store']);
Route::post('create-mata-kuliah', [MataKuliahController::class, 'store']);