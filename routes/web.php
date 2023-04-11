<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
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

Route::post('/notify', function () {
    return back()->toast('Notificação');
});

Route::get('/detail/{id}', [HomeController::class, 'home']);

Route::get('/dashboard', [PropertyController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/property', [PropertyController::class, 'create'])->middleware(['auth', 'verified'])->name('create.property');
Route::post('/property', [PropertyController::class, 'store'])->middleware(['auth', 'verified'])->name('create.property');
Route::get('/property/{id}', [PropertyController::class, 'show'])->name('show.property');
Route::get('/property/{id}/edit', [PropertyController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit.property');
Route::post('/property/{id}/edit', [PropertyController::class, 'update'])->middleware(['auth', 'verified'])->name('edit.property');
Route::delete('/property/{id}', [PropertyController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete.property');

Route::post('/image', [ImageController::class, 'store'])->middleware(['auth', 'verified'])->name('create.image');
Route::delete('/image/{id}', [ImageController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete.image');
