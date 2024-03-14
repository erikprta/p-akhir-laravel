<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\Nilai_mhsController;
use App\Http\Controllers\AfterRegisterController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aboutus',[HomeController::class,'aboutus']);

Route::resource('nilai_mhs', Nilai_mhsController::class)->middleware('auth');; 
Route::resource('matakuliah', MatakuliahController::class)->middleware('auth');; 
Route::resource('jurusan', JurusanController::class)->middleware('auth');; 

//Menambah Route Baru
Route::get('nilai_mhspdf', [Nilai_mhsController::class, 'nilai_mhsPDF'])->name('nilai_mhspdf');
Route::get('nilai_mhscsv',[Nilai_mhsController::class,'nilai_mhscsv']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/afterregister', [AfterRegisterController::class, 'index'])->name('afterregister');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    // Halaman yang hanya dapat diakses oleh pengguna yang terautentikasi
})->middleware('auth');

