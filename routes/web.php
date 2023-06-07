<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;


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


/* This code defines a route for the root URL of the web application. When a user visits the root URL,
the function specified in the second parameter of `Route::get()` is executed. In this case, the
function returns a view called "welcome" and passes an array of data to the view, including the
version of Laravel and PHP being used. */
Route::get('/', function () {
    return view('welcome', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
