<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PackageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/konsultasi', [ConsultationController::class, 'index'])->name('consultation.index');
Route::post('/konsultasi', [ConsultationController::class, 'store'])->name('consultation.store');
Route::get('/paket-umroh', [PackageController::class, 'index'])->name('packages.index');
Route::get('/paket-umroh/{slug}', [PackageController::class, 'show'])->name('packages.show');