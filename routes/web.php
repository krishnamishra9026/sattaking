<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Frontend\IndexController;

use App\Http\Controllers\Employee\ChangePasswordController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Employee\MyProfileController;
use App\Http\Controllers\Employee\ProfileController;



Route::get('/', [IndexController::class, 'home'])->name('home.index');
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('about-us.index');
Route::get('/privacy-policy', [IndexController::class, 'privacy'])->name('privacy-policy.index');
Route::get('/terms-of-use', [IndexController::class, 'terms'])->name('terms-of-use.index');
Route::get('run',[IndexController::class,'commandRunner']);

Route::get('/game/{game}/chart', [App\Http\Controllers\Frontend\GameController::class, 'chart'])->name('game.chart');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
