<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;

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

Route::get('/test', function () {
    return view('test');
});

Route::post('/run-code', function () {
    $javaCode = request('javaCode');

    $tempFilePath = 'MPC123.tmp';
    $javaFilePath = $tempFilePath.'.java';

    file_put_contents($javaFilePath, $javaCode);

    exec('javac '.$javaFilePath, $output);
    exec('java Main', $output);

    return back()->with('result', $output[0]);
})->name('run-code');

require __DIR__.'/auth.php';
