<?php

use App\Http\Controllers\BE\UserController;
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


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::post('/store', [UserController::class, 'store'])->name('user-store');
    Route::get('/all', [UserController::class, 'all'])->name('user-all');
    Route::get('/edit', [UserController::class, 'edit'])->name('user-edit');
    Route::post('/update', [UserController::class, 'update'])->name('user-update');
    Route::delete('/delete', [UserController::class, 'delete'])->name('user-delete');
});
require __DIR__ . '/auth.php';
