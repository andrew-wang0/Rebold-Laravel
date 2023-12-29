<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ProfileController;
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

// Index
Route::get('/', function () {
    //    return view('welcome');
    return redirect()->route('login');
});

// Auth
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.redirect');

Route::get('auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Assignments
Route::get('/assignments', function () {
    return view('assignments');
})->middleware(['auth', 'verified'])->name('assignments');

// Canvas
Route::get('/canvas', function () {
    return view('canvas');
})->middleware(['auth', 'verified'])->name('canvas');

require __DIR__.'/auth.php';
