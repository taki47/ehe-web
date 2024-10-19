<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\RolePermissionController;

Route::get('/', [PublicController::class, "index"])->name("home");

Route::get('/login', [AuthController::class, "login"])->name("login");
Route::post('/login', [AuthController::class, "loginAttempt"])->name("loginAttempt");

Route::prefix('admin')->middleware("checkUser")->group(function () {
    Route::get('/logout', [AuthController::class, "logout"])->name("logout");

    Route::get('/', [AdminController::class, "dashboard"])->name("admin.dashboard");

    Route::resource("users", Usercontroller::class);
    Route::resource("roles", RoleController::class);
    
    Route::get('permissions', [RolePermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions', [RolePermissionController::class, 'update'])->name('permissions.update');
});