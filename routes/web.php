<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModeratorController;
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

Route::get('/auth/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login.post');

Route::group(['middleware' => ['auth:web']], function(){
    Route::get('/home', [ModeratorController::class, 'index'])->name('moderator.home.index');
    Route::get('/audience', [ModeratorController::class, 'audience'])->name('moderator.home.audience');
    Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout.index');
});
Route::get('/', [HomeController::class, 'index'])->name('guest.home.index');
Route::get('/{id}/detail', [HomeController::class, 'detail'])->name('guest.home.detail');
Route::get('/{id}/register', [HomeController::class, 'indexRegister'])->name('guest.home.register');
Route::post('/register', [HomeController::class, 'register'])->name('guest.post.register');
