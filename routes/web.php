<?php

use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\FeedControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserviewController;

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
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::get('/home', [FeedControler::class, 'index'])->name('feed');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::middleware('auth')->group(function (){
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('/edit-profile', [EditProfileController::class, 'index'])->name('edit.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy') ;
});

Route::get('{user:username}/{post}',  [UserviewController::class, 'show']) -> name ('user.show');
Route::get('/{user:username}', [UserviewController::class, 'index'])->name('user.index');