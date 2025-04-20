<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagement\PermissionController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\Master\RolesController;
use App\Http\Controllers\Admin\MyAccountController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GameResultController;

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware('auth:admin')->group(function () {

    // Dashboard
    Route::resource('dashboard', DashboardController::class);

   

    // User Management
    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserController::class);
        Route::resource('/user-management/roles', RoleController::class);
        Route::resource('/user-management/permissions', PermissionController::class);

        // Route::resource('/user-management/employees', EmployeeController::class);
        // Route::resource('/user-management/employers', EmployerController::class);
    });

    // Settings
    Route::get('/setting/general-setting', [GeneralSettingController::class, 'index'])->name('setting.general-setting');
    Route::get('/setting/my-account', [MyAccountController::class, 'index'])->name('setting.my-account');
    Route::get('/setting/change-password', [ChangePasswordController::class, 'index'])->name('setting.change-password');

    // Games Routes
    Route::group(['prefix' => 'games', 'as' => 'games.'], function () {
        Route::get('/', [GameController::class, 'index'])->name('index');
        Route::get('/create', [GameController::class, 'create'])->name('create');
        Route::post('/store', [GameController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GameController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [GameController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [GameController::class, 'destroy'])->name('destroy');
    });

    // Games Result Routes
    Route::group(['prefix' => 'games-result', 'as' => 'games.result.'], function () {
        Route::get('/', [GameResultController::class, 'index'])->name('index');
        Route::get('/create', [GameResultController::class, 'create'])->name('create');
        Route::post('/store', [GameResultController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GameResultController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [GameResultController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [GameResultController::class, 'destroy'])->name('destroy');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::group(['prefix' => 'superadmin', 'as' => 'superadmin.'], function () {

// });
