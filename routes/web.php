<?php

use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
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
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home.index');
    Route::get('/audience', [ModeratorController::class, 'audience'])->name('admin.home.audience');
    Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout.index');
    Route::delete('/event/document/{document}', [EventController::class, 'documentDestory'])->name('document.destroy');
    Route::resource('/event', EventController::class);
});
Route::get('/', [HomeController::class, 'index'])->name('guest.home.index');
Route::get('/{id}/detail', [HomeController::class, 'detail'])->name('guest.home.detail');
Route::get('/{id}/register', [HomeController::class, 'indexRegister'])->name('guest.home.register');
Route::post('/register', [HomeController::class, 'register'])->name('guest.post.register');
