<?php

use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\EventPackageController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\ParticipantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModeratorController;
use Illuminate\Support\Facades\Artisan;
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
    Route::get('/audience', [ParticipantController::class, 'index'])->name('audience.index');
    Route::get('/audience/{id}/edit', [ParticipantController::class, 'edit' ])->name('audience.edit');
    Route::delete('/event/document/{document}', [EventController::class, 'documentDestory'])->name('document.destroy');
    Route::resource('/event', EventController::class);
    Route::resource('event.package', EventPackageController::class);

    Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout.index');
});
Route::get('/', [HomeController::class, 'index'])->name('guest.home.index');
Route::get('/{id}/detail', [HomeController::class, 'detail'])->name('guest.home.detail');
Route::get('/{id}/register', [HomeController::class, 'indexRegister'])->name('guest.home.register');
Route::post('/register', [HomeController::class, 'register'])->name('guest.post.register');
Route::get('/payment/{uuid}', [HomeController::class, 'payment'])->name('guest.payment');
Route::get('/thankyou', [HomeController::class, 'thankyou'])->name('guest.thankyou');

Route::get('/migrate', function(){
    Artisan::call('migrate');
});

Route::get('/optimize', function(){
    Artisan::call('optimize');
});
