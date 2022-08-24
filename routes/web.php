<?php

use App\Http\Controllers\SiteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/admin', function () {
    return Inertia::render('Home', [
        'title' => 'Dashboard'
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/account', function () {
    return Inertia::render('Account', [
        'title' => 'My Account'
    ]);
})->middleware(['auth', 'verified'])->name('account.index');

Route::post('/notify', function () {
    return back()->toast('This notification comes from the server side =)');
});


Route::get('/sites', [SiteController::class, 'index'])->middleware(['auth', 'verified'])->name('sites');
Route::get('/site', [SiteController::class, 'create'])->middleware(['auth', 'verified'])->name('criar.site');
Route::post('/site', [SiteController::class, 'store'])->middleware(['auth', 'verified'])->name('criar.site');
Route::get('/site/{id}', [SiteController::class, 'destroy'])->middleware(['auth', 'verified'])->name('remover.site');
Route::get('/site/{id}/edit', [SiteController::class, 'edit'])->middleware(['auth', 'verified'])->name('editar.site');
Route::post('/site/{id}/edit', [SiteController::class, 'update'])->middleware(['auth', 'verified'])->name('editar.site');
Route::get('/users', [SiteController::class, 'index'])->middleware(['auth', 'verified'])->name('usuarios');
