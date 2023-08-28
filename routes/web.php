<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('marques', MarqueController::class)->middleware(['auth']);
Route::resource('modeles', ModeleController::class)->middleware(['auth']);
Route::resource('voitures', VoitureController::class)->middleware(['auth']);

Route::get('/profile', [ProfileController::class, 'edit'])->name('products.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('products.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('products.destroy');
require __DIR__.'/auth.php';
