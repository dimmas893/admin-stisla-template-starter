<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin-store');
Route::get('/admin/all', [App\Http\Controllers\AdminController::class, 'all'])->name('admin-all');
Route::get('/admin/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin-edit');
Route::post('/admin/update', [App\Http\Controllers\AdminController::class, 'update'])->name('admin-update');
Route::delete('/admin/delete', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin-delete');


require __DIR__.'/auth.php';
