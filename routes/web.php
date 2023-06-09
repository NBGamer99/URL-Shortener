<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\ShortUserController;
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
})->name('welcome');

Route::get('/dashboard', [UserDashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/shorten', [ShortUrlController::class, 'index'])->name('shorten.index');
Route::post('/shorten', [ShortUrlController::class, 'short'])->name('shorten.url');
Route::delete('/url/delete/{id}', [ShortUrlController::class, 'destroy'])->middleware(['auth', 'verified'])->name('shorten.destroy');
Route::put('/links/{id}', [ShortUrlController::class, 'update'])->middleware(['auth', 'verified'])->name('shorten.update');
Route::get('/shorten/{short_url}', [ShortUrlController::class, 'redirect'])->name('shorten.redirect');
Route::resource('/links', ShortUserController::class)->only(['index'])->middleware(['auth', 'verified'])->name('index', 'links.index');

require __DIR__.'/auth.php';
