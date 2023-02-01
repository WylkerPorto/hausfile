<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
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
Route::get('/', [HomeController::class, 'home']);

Route::get('/admin', [HomeController::class, 'admin'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/account', [HomeController::class, 'profile'])->middleware(['auth', 'verified'])->name('perfil');

/* 
Route::get('/sites', [SiteController::class, 'index'])->middleware(['auth', 'verified'])->name('sites');
Route::get('/site', [SiteController::class, 'create'])->middleware(['auth', 'verified'])->name('criar.site');
Route::post('/site', [SiteController::class, 'store'])->middleware(['auth', 'verified'])->name('criar.site');
Route::delete('/site/{id}', [SiteController::class, 'destroy'])->middleware(['auth', 'verified'])->name('remover.site');
Route::get('/site/{id}/edit', [SiteController::class, 'edit'])->middleware(['auth', 'verified'])->name('editar.site');
Route::put('/site/{id}/edit', [SiteController::class, 'update'])->middleware(['auth', 'verified'])->name('editar.site');
Route::get('/site/{id}/img', [ImageController::class, 'show'])->middleware('auth')->name('site.imagens');


Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('usuarios');
Route::get('/user', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('criar.usuario');
Route::post('/user', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('criar.usuario');
Route::get('/user/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('remover.usuario');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('editar.usuario');
Route::put('/user/{id}/edit', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('editar.usuario'); */
