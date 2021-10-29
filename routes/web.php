<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\BackendController;

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

// Home route
Route::get('/', [FrontController::class, 'index'])->name('home');

// Register routes
Route::get('register', [Registercontroller::class, 'create'])->middleware('guest');
Route::post('register', [Registercontroller::class, 'store'])->middleware('guest');

// Login and logout routes
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin routes
Route::get('admin', [BackendController::class, 'index'])->middleware('admin');
