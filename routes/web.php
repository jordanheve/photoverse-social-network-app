<?php


use App\Http\Controllers\FeedControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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



Route::redirect('/', '/home'); 

Route::middleware('guest')->group(function () {  
    Route::get('/sign-up', [RegisterController::class, 'index'])->name('sign-up');
    Route::post('/sign-up', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::get('/home', [FeedControler::class, 'index'])->name('feed');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
