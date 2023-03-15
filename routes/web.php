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

Route::get('/detail/{id}', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'profile'])->middleware(['auth', 'verified'])->name('perfil');
