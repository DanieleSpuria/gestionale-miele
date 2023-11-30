<?php

use App\Http\Controllers\BowlController;
use App\Http\Controllers\CapController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QualityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])
  ->name('app.')
  ->prefix('app')
  ->group(function(){
    Route::resource('qualities', QualityController::class);
    Route::resource('bowls', BowlController::class);
    Route::resource('caps', CapController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
  });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
